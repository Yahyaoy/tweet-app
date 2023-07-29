<h3 class="font-bold text-xl mb-4">Following</h3>

<ul>
    <li>
        @foreach(auth()->user()->follows as $user)
        <div class="flex items-center text-sm">
            <img
                src="https://i.pravatar.cc/40"
                alt=""
                class="rounded-full mt-3 mb-3 mr-3"
            >
            {{ $user->name }}
        </div>
        @endforeach
    </li>
</ul>

