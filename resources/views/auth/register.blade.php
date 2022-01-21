<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
           
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" id="contactForm" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-label for="gender" :value="__('Gender')" />

                <x-input id="gender" class="block mt-1 w-full" type="text" name="gender"  required />
            </div>

            <div class="mt-4">
                <x-label for="profile_photo" :value="__('Profile Photo')" />

                <x-input class="block mt-1 w-full" id="profile_photo"  type="file" name="profile_photo"  required />
            </div>

            <div class="mt-4">
                <x-label for="dob" :value="__('Date Of Birth')" />

                <x-input id="dob" class="block mt-1 w-full" type="date" name="dob"  required />
            </div>

            <div class="mt-4">
                <x-label for="anniversary_date" :value="__('Anniversary Date')" />

                <x-input id="anniversary_date" class="block mt-1 w-full"  type="date" name="anniversary_date"  required />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button id="submit" class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

  </x-guest-layout>
        </x-auth-card>
     
