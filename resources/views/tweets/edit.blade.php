<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
            <form method="POST" action="{{ route('tweets.update', $tweet->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <textarea id="body"
                          name="body"
                          class="w-full"
                          placeholder="What's up doc?"
                          required
                          maxlength="255"
                >{{ old('body',$tweet->body ) }}</textarea>
                <span id="remainingChars">255</span> characters remaining
                <x-text-input name="tweet_image" type="file"/>
                <hr class="my-4">

                <footer class="flex justify-between">
                    <img
                        src="{{ auth()->user()->avatar }} "
                        alt=""
                        class="rounded-full mr-2"
                        style="width: 44px; height: 44px;"
                    >
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow py-2 px-2 text-white"
                    >
                        Update Tweet
                    </button>
                </footer>
            </form>
        </div>

    </div>
</x-app-layout>
