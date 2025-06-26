<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name Field -->
            <div>
                <x-input-label for="name" :value="__('Full Name')" class="flex items-center">
                    <i class="bi bi-person mr-2 text-gray-500"></i>
                    {{ __('Full Name') }}
                </x-input-label>
                <x-text-input id="name" name="name" type="text" class="mt-2 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <!-- Email Field -->
            <div>
                <x-input-label for="email" :value="__('Email Address')" class="flex items-center">
                    <i class="bi bi-envelope mr-2 text-gray-500"></i>
                    {{ __('Email Address') }}
                </x-input-label>
                <x-text-input id="email" name="email" type="email" class="mt-2 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
        </div>

        <!-- Email Verification Notice -->
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="p-4 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-700 rounded-lg">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i class="bi bi-exclamation-triangle text-yellow-600 dark:text-yellow-400"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800 dark:text-yellow-300">
                            {{ __('Email Verification Required') }}
                        </h3>
                        <p class="mt-1 text-sm text-yellow-700 dark:text-yellow-400">
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification" class="underline text-sm text-yellow-700 dark:text-yellow-400 hover:text-yellow-900 dark:hover:text-yellow-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 dark:focus:ring-offset-gray-800 font-medium">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 text-sm font-medium text-green-700 dark:text-green-400 flex items-center">
                                <i class="bi bi-check-circle mr-1"></i>
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-600">
            <div class="flex items-center gap-4">
                <x-primary-button class="flex items-center">
                    <i class="bi bi-check-circle mr-2"></i>
                    {{ __('Save Changes') }}
                </x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        x-init="setTimeout(() => show = false, 3000)"
                        class="text-sm text-green-600 dark:text-green-400 flex items-center bg-green-50 dark:bg-green-900/20 px-3 py-2 rounded-lg"
                    >
                        <i class="bi bi-check-circle-fill mr-2"></i>
                        {{ __('Profile updated successfully.') }}
                    </p>
                @endif
            </div>
        </div>
    </form>
</section>
