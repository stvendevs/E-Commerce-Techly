<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class EmailOtp extends Model
{
    protected $fillable = [
        'email',
        'otp',
        'expires_at',
        'verified',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'verified' => 'boolean',
    ];

    /**
     * Generate a new OTP for the given email.
     */
    public static function generate(string $email): self
    {
        // Delete any existing OTPs for this email
        self::where('email', $email)->delete();

        // Generate 6-digit OTP
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        return self::create([
            'email' => $email,
            'otp' => $otp,
            'expires_at' => Carbon::now()->addMinutes(5), // 5 minutes expiry
            'verified' => false,
        ]);
    }

    /**
     * Check if the OTP is valid (not expired and not verified).
     */
    public function isValid(): bool
    {
        return !$this->verified && $this->expires_at->isFuture();
    }

    /**
     * Verify the OTP.
     */
    public function verify(): bool
    {
        if (!$this->isValid()) {
            return false;
        }

        $this->verified = true;
        $this->save();

        return true;
    }

    /**
     * Find valid OTP by email and code.
     */
    public static function findValidOtp(string $email, string $otp): ?self
    {
        return self::where('email', $email)
            ->where('otp', $otp)
            ->where('verified', false)
            ->where('expires_at', '>', Carbon::now())
            ->first();
    }
}
