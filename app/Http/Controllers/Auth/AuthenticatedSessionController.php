<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Get account type from request (buyer or seller)
        $accountType = $request->input('account_type', 'buyer');

        // Store in session for tracking
        $request->session()->put('login_as', $accountType);

        // Handle redirect based on account type
        if ($accountType === 'seller') {
            // Check if user has a store
            $store = Auth::user()->store;
            
            if ($store) {
                // Redirect to seller dashboard if store exists
                return redirect()->route('seller.dashboard');
            } else {
                // Redirect to store registration if no store
                return redirect()->route('seller.store.create')
                    ->with('info', 'Silakan daftarkan toko Anda terlebih dahulu untuk mulai berjualan.');
            }
        }

        // Default: redirect buyer to homepage
        return redirect()->route('home');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
