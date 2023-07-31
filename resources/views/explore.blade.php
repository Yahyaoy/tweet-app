<x-app-layout>
    <div>
        @foreach ($users as $user)
        <div class="flex items-center mb-5">
            <img src="{{ $user->avatar }}"
                 alt="{{ $user->username }}'s avatar"
                 style="width: 60px; height: 60px"
                 class="mr-4"
            >

            <div>
                <a href="{{ route('profile', $user->username) }}">
                    <h4 class="font-bold ">{{'@' . $user->username }}</h4>
                </a>
            </div>
        </div>
        @endforeach

            @if ($users->count() > 0)
                <div class="pagination">
                    {{ $users->links() }}
                </div>
            @endif
    </div>
</x-app-layout>
