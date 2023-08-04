<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-blue-100'}}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ $tweet->user->path() }}">
            <img
                src="{{  $tweet->user->avatar }}"
                alt=""
                class="rounded-full mr-2"
                style="width: 33px;height: 33px;"
            >
        </a>
    </div>

    <div class="flex justify-between flex-grow">
        <div class="flex-grow"> <!-- Content on the left, takes available space -->
            <h5 class="font-bold mb-4">
                <a href="{{ $tweet->user->path() }}">
                    {{ $tweet->user->name }}
                </a>
            </h5>
            <div class="flex">
                <p class="text-sm">{{ $tweet->body }}</p>
            </div>

            <div class="m-5">
                @if($tweet->tweet_image!=null)
                    <img src="{{ asset('storage/'.$tweet->tweet_image) }}"
                         alt="NO THING"
                         class="rounded-xl ml-6" width="450" height="250">
                @endif
            </div>

            @auth
                <x-like-buttons :tweet="$tweet"/>
            @endauth
        </div>

        <div class="flex items-start"> <!-- Buttons on the right, next to each other -->
            <a href="{{ route('tweets.edit', $tweet->id) }}">
                <button type="button"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2  mb-2 dark:focus:ring-yellow-900">
                    Edit
                </button>
            </a>

            <form method="POST" action="{{ route('tweets.destroy', $tweet->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    Remove
                </button>
            </form>
        </div>
    </div>
</div>
