<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 ">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Login!</h1>

                <form action="/login" method="post" class="mt-10">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="email" />
                    <x-form.input name="password" type="password" autocomplete="password" />

                    <x-form.button>Login</x-form.button>

                </form>

            </x-panel>
        </main>
    </section>
</x-layout>
