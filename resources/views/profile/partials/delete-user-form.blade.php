<section class="space-y-6">
    <!-- Warning Notice -->
    <div class="p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-700 rounded-lg">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <i class="bi bi-exclamation-triangle text-red-600 dark:text-red-400"></i>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800 dark:text-red-300">
                    {{ __('Permanent Action') }}
                </h3>
                <p class="mt-1 text-sm text-red-700 dark:text-red-400">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                </p>
                <ul class="mt-2 text-xs text-red-600 dark:text-red-400 space-y-1">
                    <li class="flex items-center">
                        <i class="bi bi-x-circle mr-2 text-xs"></i>
                        {{ __('All your form submissions will be deleted') }}
                    </li>
                    <li class="flex items-center">
                        <i class="bi bi-x-circle mr-2 text-xs"></i>
                        {{ __('Your profile information will be removed') }}
                    </li>
                    <li class="flex items-center">
                        <i class="bi bi-x-circle mr-2 text-xs"></i>
                        {{ __('This action cannot be undone') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Delete Button -->
    <div class="flex justify-end">
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="flex items-center"
        >
            <i class="bi bi-trash mr-2"></i>
            {{ __('Delete Account') }}
        </x-danger-button>
    </div>

    <!-- Confirmation Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <div class="flex items-center mb-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-red-100 dark:bg-red-900/20 rounded-full flex items-center justify-center">
                        <i class="bi bi-exclamation-triangle text-red-600 dark:text-red-400 text-xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Are you sure you want to delete your account?') }}
                    </h2>
                </div>
            </div>

            <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-700 rounded-lg p-4 mb-6">
                <p class="text-sm text-red-800 dark:text-red-300">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>
            </div>

            <div class="mb-6">
                <x-input-label for="password" class="flex items-center text-gray-700 dark:text-gray-300">
                    <i class="bi bi-lock mr-2"></i>
                    {{ __('Confirm with Password') }}
                </x-input-label>

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-2 block w-full"
                    placeholder="{{ __('Enter your current password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end space-x-3">
                <x-secondary-button x-on:click="$dispatch('close')" class="flex items-center">
                    <i class="bi bi-x mr-2"></i>
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="flex items-center">
                    <i class="bi bi-trash mr-2"></i>
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
