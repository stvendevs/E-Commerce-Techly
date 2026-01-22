<x-guest-layout title="Verifikasi OTP">
    <div class="mb-4 text-sm text-gray-600 text-center">
        Masukkan kode OTP 6 digit yang telah dikirim ke <strong>{{ $email }}</strong>
    </div>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600 text-center">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('otp.verify') }}">
        @csrf

        <!-- OTP Input -->
        <div class="mb-6">
            <x-input-label for="otp" value="Kode OTP" class="text-center" />
            <div class="flex justify-center gap-2 mt-2">
                <x-text-input 
                    id="otp" 
                    type="text" 
                    name="otp" 
                    class="block w-48 text-center text-2xl tracking-[0.5em] font-mono"
                    maxlength="6"
                    pattern="[0-9]{6}"
                    inputmode="numeric"
                    autocomplete="one-time-code"
                    placeholder="000000"
                    required 
                    autofocus 
                />
            </div>
            <x-input-error :messages="$errors->get('otp')" class="mt-2 text-center" />
        </div>

        <!-- Timer Info -->
        <div class="text-center text-sm text-gray-500 mb-4">
            <span id="timer-text">Kode berlaku selama <span id="countdown" class="font-semibold text-indigo-600">5:00</span></span>
        </div>

        <!-- Submit Button -->
        <div class="flex flex-col items-center gap-4">
            <x-primary-button class="w-full justify-center">
                Verifikasi
            </x-primary-button>
        </div>
    </form>

    <!-- Resend OTP -->
    <div class="mt-6 text-center">
        <form method="POST" action="{{ route('otp.resend') }}" id="resend-form">
            @csrf
            <button 
                type="submit" 
                id="resend-btn"
                class="text-sm text-indigo-600 hover:text-indigo-800 underline disabled:opacity-50 disabled:cursor-not-allowed"
            >
                Kirim Ulang Kode OTP
            </button>
        </form>
    </div>

    <!-- Logout -->
    <div class="mt-4 text-center">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-gray-600 hover:text-gray-900 underline">
                Keluar
            </button>
        </form>
    </div>

    <script>
        // Countdown timer (5 minutes)
        let timeLeft = 300; // 5 minutes in seconds
        const countdownEl = document.getElementById('countdown');
        const timerTextEl = document.getElementById('timer-text');
        
        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            countdownEl.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
            
            if (timeLeft <= 0) {
                timerTextEl.innerHTML = '<span class="text-red-500 font-semibold">Kode telah kadaluarsa</span>';
                clearInterval(timerInterval);
            } else {
                timeLeft--;
            }
        }
        
        const timerInterval = setInterval(updateTimer, 1000);
        updateTimer();

        // Auto-format OTP input
        const otpInput = document.getElementById('otp');
        otpInput.addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);
        });
    </script>
</x-guest-layout>
