<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="max-w-xl p-4 sm:p-8">
                    @include('profile.partials.update-profile-information-form', [
                    'user' => $user
                    ])
                </div>
            </div>

            <div class="bg-white shadow sm:rounded-lg">
                <div class="max-w-xl p-4 sm:p-8">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="bg-white shadow sm:rounded-lg">
                <div class="max-w-xl p-4 sm:p-8">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
