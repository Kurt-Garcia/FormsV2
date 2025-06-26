<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <x-input-label for="update_password_current_password" class="flex items-center">
                <i class="bi bi-lock mr-2 text-gray-500"></i>
                {{ __('Current Password') }}
            </x-input-label>
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-2 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- New Password -->
            <div>
                <x-input-label for="update_password_password" class="flex items-center">
                    <i class="bi bi-shield-lock mr-2 text-gray-500"></i>
                    {{ __('New Password') }}
                </x-input-label>
                <x-text-input id="update_password_password" name="password" type="password" class="mt-2 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    {{ __('Password must be at least 8 characters long.') }}
                </p>
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="update_password_password_confirmation" class="flex items-center">
                    <i class="bi bi-shield-check mr-2 text-gray-500"></i>
                    {{ __('Confirm Password') }}
                </x-input-label>
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-2 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <!-- Password Requirements -->
        <div class="p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-700 rounded-lg">
            <h4 class="text-sm font-medium text-blue-900 dark:text-blue-300 flex items-center mb-2">
                <i class="bi bi-info-circle mr-2"></i>
                {{ __('Password Requirements') }}
            </h4>
            <ul class="text-xs text-blue-800 dark:text-blue-400 space-y-1">
                <li class="flex items-center">
                    <i class="bi bi-check-circle text-green-500 mr-2 text-xs"></i>
                    {{ __('At least 8 characters long') }}
                </li>
                <li class="flex items-center">
                    <i class="bi bi-check-circle text-green-500 mr-2 text-xs"></i>
                    {{ __('Mix of letters, numbers, and symbols recommended') }}
                </li>
                <li class="flex items-center">
                    <i class="bi bi-check-circle text-green-500 mr-2 text-xs"></i>
                    {{ __('Different from your current password') }}
                </li>
            </ul>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-600">
            <div class="flex items-center gap-4">
                <x-primary-button class="flex items-center">
                    <i class="bi bi-shield-check mr-2"></i>
                    {{ __('Update Password') }}
                </x-primary-button>

                @if (session('status') === 'password-updated')
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
                        {{ __('Password updated successfully.') }}
                    </p>
                @endif
            </div>
        </div>
    </form>
</section>
