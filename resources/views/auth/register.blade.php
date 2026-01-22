<x-guest-layout title="Daftar">
    <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-3">
        @csrf

        <!-- Account Type Selection -->
        <div class="account-type-container">
            <label class="account-type-label">Daftar Sebagai</label>
            <div class="account-type-toggle">
                <div class="account-type-wrapper">
                    <input type="radio" id="reg_buyer" name="account_type" value="buyer" checked>
                    <label for="reg_buyer" class="account-type-option">
                        <svg class="account-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span>Pembeli</span>
                    </label>
                </div>
                
                <div class="account-type-wrapper">
                    <input type="radio" id="reg_seller" name="account_type" value="seller">
                    <label for="reg_seller" class="account-type-option">
                        <svg class="account-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <span>Penjual</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" value="Nama" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" value="Kata Sandi" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" value="Konfirmasi Kata Sandi" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Register Button -->
        <div class="mt-2">
            <x-primary-button class="w-full py-2">
                Daftar
            </x-primary-button>
        </div>

        <!-- Already registered -->
        <div class="mt-2 text-center">
            <a class="text-sm text-gray-600 hover:text-gray-900 underline" href="{{ route('login') }}">
                Sudah punya akun?
            </a>
        </div>
    </form>
</x-guest-layout>
