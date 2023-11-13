<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="name">
                        {{ __('name') }}
                    </label>
                    <input class="w-full p-2 border border-gray-400 rounded" type="text" id="name" name="name" value=""
                        required>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="username">
                        Username
                    </label>
                    <input class="w-full p-2 border border-gray-400 rounded" type="text" id="username" name="username"
                        value="" required>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="email">
                        {{ __('email') }}
                    </label>
                    <input class="w-full p-2 border border-gray-400 rounded" type="email" id="email" name="email"
                        value="" required>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="password">
                        {{ __('password') }}
                    </label>
                    <input class="w-full p-2 border border-gray-400 rounded" type="password" id="password"
                        name="password" value="" required>
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Submit
                    </button>
                </div>

            </form>
        </main>
    </section>
</x-layout>
