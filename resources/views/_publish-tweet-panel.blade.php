<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets" enctype="multipart/form-data">
        @csrf
        <textarea id="body"
                  name="body"
                  class="w-full"
                  placeholder="What's up doc?"
                  required
        >
                    </textarea>
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
                Tweet now
            </button>
        </footer>
    </form>
    @error('body')
    <p class="text-red-600 text-sm mt-3">{{ $message }}</p>
    @enderror
</div>
