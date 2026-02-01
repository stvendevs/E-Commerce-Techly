<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\OtpVerificationController;
use App\Models\User;
use App\Models\Buyer;
use App\Models\Store;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $accountType = $request->input('account_type', 'buyer');

        // Base validation rules
        $rules = [
            'account_type' => ['required', 'in:buyer,seller'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        // Add conditional validation based on account type
        if ($accountType === 'seller') {
            $rules['store_name'] = ['required', 'string', 'max:255'];
        } else {
            $rules['name'] = ['required', 'string', 'max:255'];
        }

        $request->validate($rules);

        // Determine the user's name
        // For seller, use store name as user name (can be updated later in profile)
        $userName = $accountType === 'seller' 
            ? $request->store_name 
            : $request->name;

        // Create user with appropriate role
        $user = User::create([
            'name' => $userName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $accountType === 'seller' ? 'seller' : 'member',
        ]);

        // Create related record based on account type
        if ($accountType === 'seller') {
            // Create Store for seller
            Store::create([
                'user_id' => $user->id,
                'name' => $request->store_name,
                'slug' => Str::slug($request->store_name) . '-' . $user->id,
                'is_verified' => false, // Will be verified by admin later
            ]);
        } else {
            // Create Buyer for buyer
            Buyer::create([
                'user_id' => $user->id,
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        // Store in session
        $request->session()->put('registered_as', $accountType);

        // Send OTP email
        OtpVerificationController::sendOtp($user);

        // Redirect to OTP verification page
        return redirect()->route('otp.notice')
            ->with('status', 'Kode OTP telah dikirim ke email Anda.');
    }
}
