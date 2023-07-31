<div class="border border-blue-300 rounded-lg mb-8">
    @forelse($tweets as $tweet)
        @include('_tweet')
    @empty
        <p class="mb-4">No tweets yet..</p>
    @endforelse

</div>
{{ $tweets->links() }}
<div class="mt-4"></div>
