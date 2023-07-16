<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-10 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In!</h1>

            <form action="{{ route('users.store') }}" method="POST" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>
                    <input type="text" name="email" id="id" required value="{{ old('email') }}" class="border border-gray-200 p-2 w-full rounded">
                    @error('email')
                    <p class="text-red-500 text-xs mt-2"></p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        password
                    </label>
                    <input type="text" name="password" id="id" required class="border border-gray-200 p-2 w-full rounded" value="{{ old('username') }}">
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Submit
                    </button>
                </div>

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <li class="text-red-500 text-xs">{{ $error }}</li>
                    @endforeach
                @endif
            </form>

        </main>
    </section>
    <x-flash/>
</x-layout>

