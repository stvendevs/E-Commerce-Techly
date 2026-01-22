<x-guest-layout title="Masuk">
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-3 w-full max-w-sm mx-auto">
        @csrf

        <!-- Account Type Selection -->
        <div class="account-type-container">
            <label class="account-type-label">Masuk Sebagai</label>
            <div class="account-type-toggle">
                <div class="account-type-wrapper">
                    <input type="radio" id="buyer" name="account_type" value="buyer" checked>
                    <label for="buyer" class="account-type-option">
                        <svg class="account-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span>Pembeli</span>
                    </label>
                </div>
                
                <div class="account-type-wrapper">
                    <input type="radio" id="seller" name="account_type" value="seller">
                    <label for="seller" class="account-type-option">
                        <svg class="account-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <span>Penjual</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" value="Kata Sandi" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-3">
            <label for="remember_me" class="inline-flex items-center cursor-pointer select-none gap-2">
                <input id="remember_me" type="checkbox" name="remember"
                    class="w-4 h-4 shrink-0 border-gray-400 rounded text-blue-600 focus:ring-blue-500 align-middle" />
                <span class="text-gray-700 text-sm leading-none align-middle">Ingat saya</span>
            </label>
        </div>

        <!-- Login Button -->
        <div class="mt-2 flex justify-center">
            <x-primary-button class="px-5 py-2 text-center">
                Masuk
            </x-primary-button>
        </div>

        <!-- Forgot Password + Register -->
        <div class="auth-footer" style="margin-top: 1rem;">
            <a href="{{ route('password.request') }}">
                Lupa kata sandi?
            </a>

            <div class="register-row">
                <span>Belum punya akun?</span>
                <a href="{{ route('register') }}">Daftar</a>
            </div>
        </div>
    </form>
</x-guest-layout>
