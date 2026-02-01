<x-guest-layout title="Daftar">
    <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4" id="registerForm">
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

        <!-- Divider -->
        <div class="border-t border-gray-200 my-1"></div>

        <!-- Name Field (for Buyer) -->
        <div id="buyerNameField">
            <x-input-label for="name" value="Nama Lengkap" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" placeholder="Masukkan nama lengkap Anda" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Store Name Field (for Seller) - Hidden by default -->
        <div id="sellerStoreField" style="display: none;">
            <x-input-label for="store_name">
                Nama Toko <span class="text-red-500">*</span>
            </x-input-label>
            <x-text-input id="store_name" class="block mt-1 w-full" type="text" name="store_name" :value="old('store_name')" placeholder="Contoh: Toko Elektronik Jaya" autocomplete="organization" />
            <x-input-error :messages="$errors->get('store_name')" class="mt-2" />
            <p class="text-xs text-gray-500 mt-1">Nama toko yang akan ditampilkan kepada pembeli</p>
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email">
                Email <span class="text-red-500">*</span>
            </x-input-label>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="contoh@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <!-- Password -->
        <div>
            <x-input-label for="password">
                Kata Sandi <span class="text-red-500">*</span>
            </x-input-label>
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation">
                Konfirmasi Kata Sandi <span class="text-red-500">*</span>
            </x-input-label>
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi kata sandi" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Register Button -->
        <div class="mt-3">
            <x-primary-button class="w-full py-3 justify-center text-base" id="submitBtn">
                <span id="btnTextBuyer">Daftar sebagai Pembeli</span>
                <span id="btnTextSeller" style="display: none;">
                    Daftar sebagai Penjual</span>
            </x-primary-button>
        </div>

        <!-- Already registered -->
        <div class="text-center">
            <span class="text-sm text-gray-500">Sudah punya akun?</span>
            <a class="text-sm text-blue-600 hover:text-blue-800 font-medium ml-1" href="{{ route('login') }}">
                Masuk di sini
            </a>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buyerRadio = document.getElementById('reg_buyer');
            const sellerRadio = document.getElementById('reg_seller');
            const buyerNameField = document.getElementById('buyerNameField');
            const sellerStoreField = document.getElementById('sellerStoreField');
            const nameInput = document.getElementById('name');
            const storeNameInput = document.getElementById('store_name');
            const btnTextBuyer = document.getElementById('btnTextBuyer');
            const btnTextSeller = document.getElementById('btnTextSeller');

            function toggleFields() {
                if (sellerRadio.checked) {
                    // Show seller fields
                    buyerNameField.style.display = 'none';
                    sellerStoreField.style.display = 'block';
                    
                    // Update required attributes
                    nameInput.removeAttribute('required');
                    storeNameInput.setAttribute('required', 'required');
                    
                    // Update button text
                    btnTextBuyer.style.display = 'none';
                    btnTextSeller.style.display = 'inline';
                    
                    // Focus on store name
                    storeNameInput.focus();
                } else {
                    // Show buyer fields
                    buyerNameField.style.display = 'block';
                    sellerStoreField.style.display = 'none';
                    
                    // Update required attributes
                    nameInput.setAttribute('required', 'required');
                    storeNameInput.removeAttribute('required');
                    
                    // Update button text
                    btnTextBuyer.style.display = 'inline';
                    btnTextSeller.style.display = 'none';
                    
                    // Focus on name
                    nameInput.focus();
                }
            }

            buyerRadio.addEventListener('change', toggleFields);
            sellerRadio.addEventListener('change', toggleFields);

            // Initial state
            toggleFields();
        });
    </script>
</x-guest-layout>
