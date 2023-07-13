<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="show password">
                    <input type="checkbox" id="togglePassword" class="form-checkbox h-5 w-5 text-indigo-600" />
                    <label for="togglePassword" class="ml-2 text-sm text-gray-600">{{ __('Show Password') }}</label>
                </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="mt-2 text-gray-600">
        Password must meet the following specifications:
        <ul class="list-disc ml-6"id="password-specs">
            <li>At least 8 characters long</li>
            <li>At least one uppercase letter</li>
            <li>At least one lowercase letter</li>
            <li>At least one number</li>
            <li>At least one special character</li>
        </ul>
    </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#password').on('input', function() {
            var password = $(this).val();
            
            var specsList = $('#password-specs li');
            specsList.removeClass('text-green-500 line-through');
            
            if (password.length >= 8) {
                specsList.eq(0).addClass('text-green-500 line-through');
            }
            
            if (/[A-Z]/.test(password)) {
                specsList.eq(1).addClass('text-green-500 line-through');
            }
            
            if (/[a-z]/.test(password)) {
                specsList.eq(2).addClass('text-green-500 line-through');
            }
            
            if (/\d/.test(password)) {
                specsList.eq(3).addClass('text-green-500 line-through');
            }
            
            if (/[^A-Za-z0-9]/.test(password)) {
                specsList.eq(4).addClass('text-green-500 line-through');
            }
        });
    });
</script>
    </form>
    <script>
        const passwordField = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('change', function() {
            if (togglePassword.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>

</x-guest-layout>
