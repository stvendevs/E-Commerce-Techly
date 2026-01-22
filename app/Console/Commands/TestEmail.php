<?php

namespace App\Console\Commands;

use App\Mail\OtpMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:test {email : The email address to send test OTP to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email configuration by sending OTP email to specified address';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $testOtp = '123456';
        
        $this->info("🚀 Mengirim test email OTP...");
        $this->info("📧 Tujuan: {$email}");
        $this->info("🔢 OTP Test: {$testOtp}");
        $this->newLine();
        
        try {
            Mail::to($email)->send(new OtpMail($testOtp, 'Test User'));
            
            $this->newLine();
            $this->components->success('Email berhasil dikirim!');
            $this->newLine();
            $this->info('📬 Silakan cek inbox email Anda');
            $this->info('📂 Jika tidak ada di Inbox, cek folder Spam/Junk');
            $this->info('🔑 Kode OTP yang dikirim: ' . $testOtp);
            $this->newLine();
            
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->newLine();
            $this->components->error('Gagal mengirim email!');
            $this->newLine();
            $this->error('Error: ' . $e->getMessage());
            $this->newLine();
            
            // Provide troubleshooting tips
            $this->warn('💡 Tips Troubleshooting:');
            $this->line('  1. Pastikan MAIL_MAILER=smtp di .env');
            $this->line('  2. Pastikan menggunakan Gmail App Password (16 karakter)');
            $this->line('  3. MAIL_PORT=587 dan MAIL_ENCRYPTION=tls');
            $this->line('  4. Jalankan: php artisan config:clear');
            $this->newLine();
            
            return Command::FAILURE;
        }
    }
}
