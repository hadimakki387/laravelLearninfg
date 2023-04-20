<x-layout>
    <section class="px-6 py-8">
        <main
            class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl"
        >
            <form action="/register" method="POST">
                @csrf
                <h1 class="text-center font-semibold text-2xl my-6">
                    Register!
                </h1>

                <div class="mb-6 grid">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="name"
                    >
                        name
                    </label>
                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="name"
                        id="name"
                        required
                    />
                </div>
                <div class="mb-6 grid">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="username"
                    >
                        Username
                    </label>
                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="username"
                        id="username"
                        required
                    />
                </div>
                <div class="mb-6 grid">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="email"
                    >
                        email
                    </label>
                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="email"
                        name="email"
                        id="email"
                        required
                    />
                </div>
                <div class="mb-6 grid">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="password"
                    >
                        password
                    </label>
                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="password"
                        name="password"
                        id="password"
                        required
                    />
                </div>
                <div class="mb-6">
                    <button type="submit"
                                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                          Submit
                      </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
