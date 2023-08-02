<x-app-layout>
    <header class="mb-6 relative">
        <div class="relative">
            <img src="{{ $user->coverImage }}"
                 alt=""
                 class="mb-2"
                 style=" width: 690px; height:267px"
            >

            <img src="{{ $user->avatar }}"
                 alt=""
                 class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                 style="left: 50% ;height: 155px;width: 148px;"
            >
        </div>

        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @can('edit', $user)
                    <a href="{{ route('profile.edit') }}"
                       class="rounded-full border border-blue-300 py-2 px-4 text-black text-xs mr-2"
                    >
                        Edit Profile
                    </a>
                @endcan

                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>
{{--        <span class="text-lg font-bold">Bio: </span>--}}
        <p class="inline">
            {{ $user->bio }}
        </p>


    </header>

    @include ('_timeline', [
        'tweets' => $tweets
    ])

</x-app-layout>
