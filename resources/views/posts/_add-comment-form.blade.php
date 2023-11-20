@auth
<x-box>
    <form method="POST" action="/posts/{{$post->slug}}/comments">
        @csrf
        <header class="felx items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">
            <h2 class="mt-5">Add a comment here!</h2>
        </header>
        <div class="mt-6">
            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" cols="30" rows="10"
                placeholder="Write your comment here"></textarea>

            @error('body')
            <span class="text-xs text-red-600 font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <x-submit-button>
                Submit
            </x-submit-button>
        </div>
    </form>
</x-box>

@else
<p class="font-bold">
    <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Login to leave
        a comment.</a>
</p>
@endauth

