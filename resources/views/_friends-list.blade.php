<h3 class="font-bold text-xl mb-4">Following</h3>

<ul>
    <li>
    @forelse(auth()->user()->follows as $user)
        <li class="{{ $loop->last ? '' : 'mb-4' }}">
            <div>
                <a href="{{ route('profile', $user) }}" class="flex items-center text-sm">
                    <img
                        src="{{ $user->avatar }}"
                        alt=""
                        class="rounded-full mt-3 mr-3"
                        style="width: 40px; height: 40px"
                    >
                    {{ $user->name }}
                </a>
            </div>
        </li>
    @empty
        <li>No friends yet.</li>
        @endforelse
        </li>
</ul>

