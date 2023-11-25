<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <h1 class="text-center font-bold text-xl">Log In</h1>
            <x-box>
                <form method="POST" action="/sessions" class="mt-10">
                    @csrf
                    <x-form.input name="email" type="email" autocomplete="username" />
                    <x-form.input name="password" type="password" autocomplete="new-password" />

                    <x-submit-button name="Log In" />
                </form>
            </x-box>
        </main>
    </section>
</x-layout>
