<x-layout>
    <section class="p-4 sm:ml-64 bg-gray-100">
        <main class="max-w-lg p-6 mx-auto my-14 mt-10">
            <h1 class="text-center font-bold text-xl">Budget</h1>
            <p class="text-sm font-md text-center">Create a new budget</p>
            <p class="text-sm font-md text-red-500 text-center">Kindly make sure that the end date is greater than the
                start date</p>
            <form method="POST" action="{{ route('budget.store') }}" class="mt-10 space-y-6">
                @csrf

                <div>
                    <label for="budget" class="block text-sm font-medium leading-6 text-gray-900">Budget</label>
                    <div class="relative mt-2">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">GH₵</span>
                        <input class="border border-gray-400 rounded-lg p-2 pl-12 w-full"
                               type="text"
                               name="budget"
                               id="budget"
                               value="{{ old('budget') }}"
                               placeholder="5,000.00"
                               autocomplete="budget"
                               required
                        >

                        @error('budget')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="start_date" class="block text-sm font-medium leading-6 text-gray-900">Start Date</label>
                    <div class="mt-2">
                        <input class="border border-gray-400 rounded-lg p-2 w-full"
                               type="date"
                               name="start_date"
                               id="start_date"
                               value="{{ old('start_date') }}"
                               required
                        >

                        @error('start_date')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="end_date" class="block text-sm font-medium leading-6 text-gray-900">End Date</label>
                    <div class="mt-2">
                        <input class="border border-gray-400 rounded-lg p-2 w-full"
                               type="date"
                               name="end_date"
                               id="end_date"
                               value="{{ old('end_date') }}"
                               required
                        >

                        @error('end_date')
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
    <script>
        document.getElementById('amount').addEventListener('input', function(e) {
            let value = e.target.value;


            value = value.replace(/[^0-9.]/g, '');


            if (value.includes('.')) {
                const parts = value.split('.');
                value = parts[0] + '.' + parts[1].slice(0, 2); // Limit to 2 decimal places
            }

            e.target.value = value;
        });
    </script>
</x-layout>
