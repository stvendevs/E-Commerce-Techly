<x-guest-layout title="Login">
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-4 w-full max-w-sm mx-auto">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-3">
            <label for="remember_me" class="inline-flex items-center cursor-pointer select-none gap-2">

                <input id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="w-4 h-4 shrink-0 border-gray-400 rounded
                            text-blue-600 focus:ring-blue-500 align-middle" />

                <span class="text-gray-700 text-sm leading-none align-middle">
                    Remember me
                </span>

            </label>
        </div>


        <!-- Login Button -->
        <div class="mt-4 flex justify-center">
            <x-primary-button class="px-5 py-2 text-center">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Forgot Password -->
        @if (Route::has('password.request'))
            <div class="mt-3 text-center">
                <a class="text-sm text-gray-600 hover:text-gray-900 underline" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            </div>
        @endif
    </form>
</x-guest-layout>
