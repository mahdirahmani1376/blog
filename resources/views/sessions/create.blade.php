<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-10 border border-gray-200 p-6 rounded-xl">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log In!</h1>

                <form action="{{ route('users.store') }}" method="POST" class="mt-10">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username" required />
                    <x-form.input name="password" type="password" autocomplete="current-password" required />

                    <x-form.button>Log In</x-form.button>

                </form>
            </x-panel>

        </main>
    </section>
    <x-flash/>
</x-layout>

