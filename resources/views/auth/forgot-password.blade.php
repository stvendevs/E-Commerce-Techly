<x-guest-layout title="Lupa Kata Sandi">
    <div class="mb-4 text-sm text-gray-600">
        Masukkan email Anda, kami akan kirimkan tautan untuk atur ulang kata sandi.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                Kirim
            </x-primary-button>
        </div>

        <!-- Back to login -->
        <div class="mt-3 text-center">
            <a class="text-sm text-gray-600 hover:text-gray-900 underline" href="{{ route('login') }}">
                Kembali ke halaman masuk
            </a>
        </div>
    </form>
</x-guest-layout>
