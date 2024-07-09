<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg p-6 mx-auto my-14 mt-10">
            <h1 class="text-center font-bold text-xl">Category</h1>
            <p class="text-sm font-md text-center">Create a new category</p>
            <form method="POST" action="{{ route('category.store') }}" class="mt-10 space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="mt-2">
                        <input class="border border-gray-400 rounded-lg p-2 w-full"
                               type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               placeholder="Transportation"
                               autocomplete="name"
                               required
                        >

                        @error('name')
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
                        value="Save"
                    >
                </div>



            </form>
        </main>
    </section>
</x-layout>
