<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg p-6 mx-auto my-14 mt-10">
            <h1 class="text-center font-bold text-xl">Login</h1>
            <p class="text-sm font-md text-center">Enter your credentials to sign into this app</p>
                <form method="POST" action="{{ route('login.store') }}" class="mt-10 space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input class="border border-gray-400 rounded-lg p-2 w-full"
                                   type="text"
                                   name="email"
                                   id="email"
                                   value="{{ old('email') }}"
                                   placeholder="example@email.com"
                                   autocomplete="email"
                                   required
                            >

                            @error('email')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="text-sm">
                                <a href="" class="font-semibold text-indigo-600
                                hover:text-indigo-500">Forgot
                                    password?</a>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input class="border border-gray-400 rounded-lg p-2 w-full"
                                   type="password"
                                   name="password"
                                   id="password"
                                   placeholder="password"
                                   required
                            >
                            @error('password')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6 mt-4">
                        <input
                            type="submit"
                            class="bg-black text-white rounded-lg w-full py-2 px-4 hover:bg-blue-800 cursor-pointer"
                            value="Log In"
                        >
                    </div>

                    <p class="mt-10 text-center text-sm text-gray-500 pb-5">
                        Not signed up?
                        <a href="{{ route('register') }}" class="font-semibold leading-6 text-indigo-600
                        hover:text-indigo-500">Sign
                            up</a>
                    </p>

                </form>
        </main>
    </section>
</x-layout>
