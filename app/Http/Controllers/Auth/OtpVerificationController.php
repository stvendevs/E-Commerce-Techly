<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\EmailOtp;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class OtpVerificationController extends Controller
{
    /**
     * Display the OTP verification view.
     */
    public function show(): View|RedirectResponse
    {
        $user = Auth::user();

        // If already verified, redirect to appropriate page
        if ($user->hasVerifiedEmail()) {
            // Redirect based on role
            if ($user->role === 'seller') {
                return redirect()->route('seller.dashboard');
            }
            return redirect()->route('home');
        }

        return view('auth.verify-otp', [
            'email' => $user->email,
        ]);
    }

    /**
     * Verify the OTP code.
     */
    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'otp' => ['required', 'string', 'size:6'],
        ]);

        $user = Auth::user();
        $otpRecord = EmailOtp::findValidOtp($user->email, $request->otp);

        if (!$otpRecord) {
            return back()->withErrors([
                'otp' => 'Kode OTP tidak valid atau sudah kadaluarsa.',
            ]);
        }

        // Mark OTP as verified
        $otpRecord->verify();

        // Mark email as verified
        $user->markEmailAsVerified();

        // Get account type from session
        $accountType = session('registered_as', 'buyer');

        // Handle redirect based on account type
        if ($accountType === 'seller') {
            return redirect()->route('seller.dashboard')
                ->with('success', 'Email berhasil diverifikasi! Selamat datang di Seller Dashboard.');
        }

        return redirect()->route('home')
            ->with('success', 'Email berhasil diverifikasi! Selamat berbelanja di Techly.');
    }

    /**
     * Resend the OTP code.
     */
    public function resend(): RedirectResponse
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            if ($user->role === 'seller') {
                return redirect()->route('seller.dashboard');
            }
            return redirect()->route('home');
        }

        // Generate new OTP
        $otpRecord = EmailOtp::generate($user->email);

        // Send OTP email
        Mail::to($user->email)->send(new OtpMail($otpRecord->otp, $user->name));

        return back()->with('status', 'Kode OTP baru telah dikirim ke email Anda.');
    }

    /**
     * Send OTP for a user (called after registration).
     */
    public static function sendOtp(User $user): void
    {
        // Generate OTP
        $otpRecord = EmailOtp::generate($user->email);

        // Send OTP email
        Mail::to($user->email)->send(new OtpMail($otpRecord->otp, $user->name));
    }
}
