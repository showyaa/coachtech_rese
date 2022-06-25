@include('layouts.header')
<x-guest-layout>
    <link rel="stylesheet" href="/css/login.css">
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="email">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="input_email" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="password">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="input_password" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="remember">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="forget_and_login">
                @if (Route::has('password.request'))
                <a class="forget_password" href="{{ route('password.request') }}">
                    {{ __('パスワードをお忘れですか?') }}
                </a>
                @endif

                <x-button class="login_btn">
                    {{ __('ログイン') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
    <script src="/js/reload.js"></script>
</x-guest-layout>