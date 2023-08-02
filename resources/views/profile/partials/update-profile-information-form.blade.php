<section>
        <header>
            <h2 class="text-lg font-medium text-blue-900">
                {{ __('Profile Information') }}
            </h2>

            <p class="mt-1 text-sm text-blue-600">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div>
                <x-input-label for="username" :value="__('UserName')"/>
                <x-text-input id="username" name="username" type="text" class="mt-1 block w-full"
                              :value="old('username', auth()->user()->username)" required autofocus
                              autocomplete="username"/>
                <x-input-error class="mt-2" :messages="$errors->get('username')"/>
            </div>

            <div>
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                              :value="old('name', auth()->user()->name)" required autofocus autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('name')"/>
            </div>

            <div>
                <x-input-label for="avatar" :value="__('Avatar')"/>
                <div class="flex">
                    <x-text-input name="avatar" type="file" :value="old('avatar', auth()->user()->avatar)"/>
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="NO THING"
                         class="rounded-xl ml-6" width="100">
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('avatar')"/>
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                              :value="old('email', auth()->user()->email)" required autocomplete="username"/>
                <x-input-error class="mt-2" :messages="$errors->get('email')"/>

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-blue-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                    class="underline text-sm text-blue-600 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button id="editButton">{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-blue-600"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
</section>
