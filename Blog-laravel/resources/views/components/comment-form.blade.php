@props(['post'])
<x-card class="bg-gray-100">

    <form method="POST" action="/posts/{{$post->slug}}/comments">
        @csrf
        <header class="flex item center">
            <img src="https://i.pravatar.cc/40?u={{auth()->id()}}" alt="profile avatar" width="40" height="40"
                 class="rounded-full">
            <h2 class="ml-4">Leave a comment</h2>
        </header>
            <x-form.textarea name="body"/>
        <div class="flex justify-end mt-1">
            <x-form.submit-button>Post</x-form.submit-button>
        </div>
    </form>
</x-card>

