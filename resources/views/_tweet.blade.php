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
    <div>
        <h5 class="font-bold mb-4">
            <a href="{{ $tweet->user->path() }}">
                {{ $tweet->user->name }}
            </a>
        </h5>
            <p class="text-sm">{{ $tweet->body }}</p>
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
</div>
