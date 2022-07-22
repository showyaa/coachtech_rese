@include('layouts.header')
<x-guest-layout>
  <link rel="stylesheet" href="/css/register.css">
  <div class="admin-create-ttl">店舗代表者作成</div>
  <x-auth-card>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register-admin') }}">
      @csrf

      <!-- Name -->
      <div class="input_div">
        <x-label for="name" :value="__('Username')" />

        <x-input id="name" class="input_input" type="text" name="name" :value="old('name')" required autofocus />
      </div>

      <!-- Email Address -->
      <div class="input_div">
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="input_input" type="email" name="email" :value="old('email')" required />
      </div>

      <!-- Password -->
      <div class="input_div">
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" class="input_input" type="password" name="password" required autocomplete="new-password" />
      </div>

      <!-- Confirm Password -->
      <div class="input_div">
        <x-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-input id="password_confirmation" class="input_input" type="password" name="password_confirmation" required />
      </div>

      <div class="done_and_register">

        <x-button class="register_btn">
          {{ __('登録') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
  <script src="/js/reload.js"></script>
</x-guest-layout>