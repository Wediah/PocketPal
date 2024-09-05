<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 p-6 ">
            <h1 class="text-center font-bold text-xl">Create an account</h1>
            <p class="text-sm font-md text-center">Enter your credentials to sign up for this app</p>
            <form method="POST" action="{{ route('register.store') }}" class="mt-10 space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="mt-2">
                        <input class="border border-gray-400 rounded-lg p-2 w-full"
                               type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               placeholder="full name"
                               required
                        >

                        @error('name')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input class="border border-gray-400 rounded-lg p-2 w-full"
                               type="text"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               placeholder="example@email.com"
                               required
                        >
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="mt-2">
                        <input class="border border-gray-400 rounded-lg p-2 w-full"
                               type="password"
                               name="password"
                               id="password"
                               placeholder="password"
                               required
                        >
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <input
                        type="submit"
                        class="bg-black text-white rounded-lg w-full py-2 px-4 hover:bg-blue-800 cursor-pointer"
                        value="Sign up"
                    >
                </div>

                <p class="mt-10 text-center text-sm text-gray-500 pb-5">
                    Already signed up?
                    <a href="{{ route('login') }}" class="font-semibold leading-6 text-indigo-600
                    hover:text-indigo-500">Sign
                        in</a>
                </p>

                <p class="text-sm font-md text-center">By signing up, you agree to our Terms of Service and Privacy Policy</p>
            </form>
        </main>
    </section>
</x-layout>
