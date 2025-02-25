<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#f0f2f5] dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-white dark:bg-gray-800 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.12)] p-8">
            <div class="text-center mb-8">
                <x-slot name="logo">
                    <x-authentication-card-logo class="mx-auto h-16 w-auto animate-pulse" />
                </x-slot>
                <h2 class="mt-4 text-4xl font-bold text-gray-900 dark:text-white">
                    {{ __('Create Account') }}
                </h2>
                <p class="mt-2 text-base text-gray-600 dark:text-gray-400">
                    {{ __('Sign up for your account') }}
                </p>
            </div>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}" class="space-y-4 -m-2">
                @csrf

                <div class="space-y-2">
                    <x-label for="name" value="{{ __('Name') }}" class="text-sm font-semibold text-gray-700 dark:text-gray-300" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <x-input id="name" class="pl-10 w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your name" />
                    </div>
                </div>

                <div class="space-y-2">
                    <x-label for="email" value="{{ __('Email') }}" class="text-sm font-semibold text-gray-700 dark:text-gray-300" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <x-input id="email" class="pl-10 w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email" />
                    </div>
                </div>

                <div class="space-y-2">
                    <x-label for="password" value="{{ __('Password') }}" class="text-sm font-semibold text-gray-700 dark:text-gray-300" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <x-input id="password" class="pl-10 w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white" type="password" name="password" required autocomplete="new-password" placeholder="Create a password" />
                    </div>
                </div>

                <div class="space-y-2">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-sm font-semibold text-gray-700 dark:text-gray-300" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <x-input id="password_confirmation" class="pl-10 w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
                    </div>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="space-y-2">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"/>
                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-between">
                    <a class="text-sm font-medium text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="flex justify-center py-3 px-6 border border-transparent rounded-xl shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transform hover:scale-[1.02] transition-all duration-300">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
