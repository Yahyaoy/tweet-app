<h3 class="font-bold text-xl mb-4">Following</h3>

<ul>
    <li>
        @forelse(auth()->user()->follows as $user)
        <div class="flex items-center text-sm">
            <a href="{{ route('profile', $user) }}">
                <img
                    src="{{ $user->avatar }}"
                    alt=""
                    class="rounded-full mt-3 mb-3 mr-3"
                    style="width: 40px; height: 40px"
                >
            </a>
            {{ $user->name }}
        </div>
        @empty
            <li>No friends yet.</li>
        @endforelse
    </li>
</ul>

