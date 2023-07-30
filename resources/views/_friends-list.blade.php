<h3 class="font-bold text-xl mb-4">Following</h3>

<ul>
    <li>
        @foreach(auth()->user()->follows as $user)
        <div class="flex items-center text-sm">
            <a href="{{ route('profile', $user) }}">
                <img
                    src="{{ $user->avatar }}"
                    alt=""
                    class="rounded-full mt-3 mb-3 mr-3"
                    width="40"
                    height="40"
                >
            </a>
            {{ $user->name }}
        </div>
        @endforeach
    </li>
</ul>

