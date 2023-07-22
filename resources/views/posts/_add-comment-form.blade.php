@auth
    <x-panel>
        <form method="post" action="{{ route('comments.store',$post->slug) }}">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                     alt=""
                     width="40"
                     height="40"
                     class="rounded-full">

                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
                <textarea
                    name="body"
                    class="w-full text-sm focus:outline-none focus:ring"
                    rows="5"
                    placeholder="Quick, thing of something to say!"
                    required></textarea>

                @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-form.button>Submit</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="{{route('users.register')}}" class="hover:underline">Register</a>
        Or
        <a href="{{route('login')}}" class="hover:underline">Login</a>
        to leave a comment.
    </p>
@endauth
