<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <p class="text-xs text-gray-900 dark:text-gray-100 text-muted">
                {{ __('By clicking Register, you agree to our') }} <a href="/legal/terms/update" id="terms-link" target="_blank" rel="nofollow">{{ __('Terms') }}</a>, <a href="/about/privacy/update" id="privacy-link" target="_blank" rel="nofollow">{{ __('Privacy Policy') }}</a> {{ __('and') }} <a href="/policies/cookies/" id="cookie-use-link" target="_blank" rel="nofollow">{{ __('Cookies Policy') }}</a>. {{ __('You may receive SMS notifications from us and can opt out at any time.') }}
            </p>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <div class="border-b border-gray-300 mt-6"></div>
    <div class="text-center">
        <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Or register with') }}
        </p>
    </div>
    <div class="mt-4 grid grid-cols-2 gap-4">
        <x-social-auth-links />
    </div>
</x-guest-layout>
