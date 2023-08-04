<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets" enctype="multipart/form-data">
        @csrf
        <textarea id="body"
                  name="body"
                  class="w-full p-3"
                  placeholder="What's up doc?"
                  required
                  maxlength="255"
        ></textarea>
        <div class="text-sm text-blue-500 mb-5"><span id="remainingChars">255</span> <span>characters remaining</span></div>
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

<script>
    const bodyTextarea = document.getElementById('body');
    const remainingCharsSpan = document.getElementById('remainingChars');
    const maxChars = 255;

    // Add input event listener to the textarea
    bodyTextarea.addEventListener('input', updateRemainingChars);

    function updateRemainingChars() {
        const currentChars = bodyTextarea.value.length;
        const remainingChars = maxChars - currentChars;

        // Update the remaining characters count in the DOM
        remainingCharsSpan.textContent = remainingChars;
    }
</script>
