<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-200 border border-gray-300 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form method="POST" action="/register" class="m-10">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        NAME
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded"
                           type="text"
                           name="name"
                           id="name"
                           value="{{ old('name') }}"
                           required
                    >

                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        USERNAME
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded"
                           type="text"
                           name="username"
                           id="username"
                           value="{{ old('username') }}"
                           required
                    >

                    @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        EMAIL
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded"
                           type="email"
                           name="email"
                           id="email"
                           value="{{ old('email') }}"
                           required
                    >

                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        PASSWORD
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded"
                           type="password"
                           name="password"
                           id="password"
                           required
                    >

                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
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
