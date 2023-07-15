<x-layout>
    @foreach($errors->all() as $error)
    {{$error}}
    @endforeach
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <form action="{{ route('users.create') }}" method="POST" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Name
                    </label>
                    <input type="text" name="name" id="id" required class="border border-gray-200 p-2 w-full rounded">
                    @error('name')
                    <p class="text-red-500 text-xs mt-2"></p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="user_name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        user_name
                    </label>
                    <input type="text" name="user_name" id="id" required class="border border-gray-200 p-2 w-full rounded">
                    @error('user_name')
                        <p class="text-red-500 text-xs mt-2"></p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>
                    <input type="text" name="email" id="id" required class="border border-gray-200 p-2 w-full rounded">
                    @error('password')
                    <p class="text-red-500 text-xs mt-2"></p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Password
                    </label>
                    <input type="password" name="password" id="id" required class="border border-gray-200 p-2 w-full rounded">
                    @error('password')
                    <p class="text-red-500 text-xs mt-2"></p>
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
            </form>
        </main>
    </section>
</x-layout>

