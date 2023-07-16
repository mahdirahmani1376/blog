@auth
    <x-panel>
        <form method="post" action="{{ route('comments.store',$post->slug) }}">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">

                <h2 class="ml-4">Want to Participate?</h2>
            </header>

            <div class="mt-6">
                <textarea name="body" rows="5" class="w-full text-sm focus:outline-none focus:ring" placeholder="Quick think of something"></textarea>
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-submit-button/>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="{{route('users.register')}}" class="hover:underline">Register</a>
        Or
        <a href="{{route('users.login')}}" class="hover:underline">Login</a>
        to leave a comment.
    </p>
@endauth
