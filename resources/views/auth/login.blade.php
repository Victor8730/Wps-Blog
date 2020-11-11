<x-guest-layout>
    <x-jet-authentication-card>
        <div>
            <x-slot name="logo">
                <x-jet-authentication-card-logo/>
            </x-slot>
            <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                {{__('auth.Sign in to your account')}}
            </h2>
        </div>

        <x-jet-validation-errors
            class="mb-4 w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"/>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form class="mt-8" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm">
                <div>
                    <x-jet-input placeholder="{{ __('Email') }}" id="email"
                                 class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                                 type="email" name="email" :value="old('email')" required autofocus/>
                </div>
                <div class="-mt-px">
                    <x-jet-input placeholder="{{ __('Password') }}" id="password"
                                 class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                                 type="password" name="password" required autocomplete="current-password"/>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </div>

                <div class="text-sm leading-5">
                    @if (Route::has('password.request'))
                        <a class="font-medium text-teal-400 hover:text-teal-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="mt-6">
                <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-cool-gray-600 hover:bg-cool-gray-500 focus:outline-none focus:border-cool-gray-700 focus:shadow-outline-indigo active:bg-cool-gray-700 transition duration-150 ease-in-out">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-teal-500 group-hover:text-teal-400 transition ease-in-out duration-150"
                 fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                    clip-rule="evenodd"/>
            </svg>
          </span>{{ __('auth.Login') }}
                </button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

