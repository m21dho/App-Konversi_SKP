<x-guest-layout>
        <div class="">
            <h1 class="text-2xl font-bold text-gray-800" style="font-size: 30px; font-weight: bold; font-family:helvetica;;">Sign up</h1>
            <p class="text-gray-600 mt-1">Sign up and get started on your projects</p>
            <br>
        </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="{{ __('name') }}" text-sm required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="{{ __('email') }}" text-sm required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="{{ __('password') }}" text-sm
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" placeholder="{{ __('confirm password') }}" text-sm required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div style="margin-top: 20px;">
                <button type="submit" class="w-full py-2 px-4 text-white text-sm font-semibold  rounded-lg focus:outline-none border-2 border-red-500" style="background-color: #077C0D;"onmouseover="this.style.backgroundColor='#26902B'; this.style.color='white';" 
                onmouseout="this.style.backgroundColor='#077C0D'; this.style.color='white';">
                Sign up
                </button>

        </div>
        <div class="flex items-center justify-end mt-4">
            <p class="text-sm text-gray-600">Already have an account?
            <a class="underline text-indigo-600 hover:underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
             {{ __('Sign In') }}
            </a>
            </p>
        </div>
    </form>
</x-guest-layout>
