<x-guest-layout>
  <form method="POST" action="{{ route('checkout') }}">
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
            <!-- Company Name -->
            <div class="mt-4">
                <x-input-label for="company" :value="__('Company')" />
                    <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company')" required />
                <x-input-error :messages="$errors->get('company')" class="mt-2" />
            </div>

            <!-- Subdomain -->
            <div class="mt-4">
              <x-input-label for="domain" :value="__('Domain')" />
              <div class="flex items-center ">
                  <x-text-input id="domain" class="block mt-1 w-4/6" type="text" name="domain" :value="old('domain')" required />
                  <p class="ps-2"> .{{config('tenancy.central_domains')[1]}}</p>
              </div>

              <x-input-error :messages="$errors->get('domain')" class="mt-2" />
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

      <div class="flex items-center justify-end mt-4">
          <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
              {{ __('Already registered?') }}
          </a>

          <x-primary-button class="ml-4">
              {{ __('Register') }}
          </x-primary-button>
      </div>
  </form>
  @push('guest_scripts')
    @vite(['resources/js/prefillSubdomain.js'])
  @endpush
</x-guest-layout>
