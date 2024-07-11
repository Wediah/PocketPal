<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg p-6 mx-auto my-14 mt-10">
            <h1 class="text-center font-bold text-xl">Expense</h1>
            <p class="text-sm font-md text-center">Add a new expense</p>
            <form method="POST" action="{{ route('expense.store') }}" class="mt-10 space-y-6">
                @csrf

                <div>
                    <label for="item" class="block text-sm font-medium leading-6 text-gray-900">Item</label>
                    <div class="mt-2">
                        <input class="border border-gray-400 rounded-lg p-2 w-full"
                               type="text"
                               name="item"
                               id="item"
                               value="{{ old('item') }}"
                               placeholder="Waakye and shito"
                               autocomplete="item"
                               required
                        >

                        @error('item')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                    <div class="mt-2">
                        <select id="category_id" name="category_id" class="border border-gray-400 rounded-lg p-2
                        w-full">
                            <option value="">Select a category</option>
                            @foreach($allCategories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected'
                                 : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="payment" class="block text-sm font-medium leading-6 text-gray-900">Payment
                            Method</label>
                        <div class="mt-2">
                            <select id="payment_id" name="payment_id" class="border border-gray-400 rounded-lg p-2
                            w-full">
                                <option value="">Select a payment method</option>
                                @foreach($allPayments as $payment)
                                    <option value="{{ $payment->id }}" {{ old('payment_id') == $payment->id ? 'selected'
                                     : '' }}>{{ $payment->name }}</option>
                                @endforeach
                            </select>

                            @error('payment_id')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="amount" class="block text-sm font-medium leading-6 text-gray-900">Amount</label>
                        <div class="relative mt-2" >
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">GH₵</span>
                            <input class="border border-gray-400 rounded-lg p-2 pl-12 w-full"
                                   type="text"
                                   name="amount"
                                   id="amount"
                                   value="{{ old('amount') }}"
                                   placeholder="35.80"
                                   autocomplete="amount"
                                   required
                            >

                            @error('amount')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="payee" class="block text-sm font-medium leading-6 text-gray-900">Payee</label>
                        <input class="border border-gray-400 rounded-lg p-2 w-full"
                               type="text"
                               name="payee"
                               id="payee"
                               placeholder="where you spent the money"
                               value="{{ old('payee') }}"
                               autocomplete="payee"
                               required
                        >

                        @error('payee')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
                            <input class="border border-gray-400 rounded-lg p-2 w-full"
                                   type="date"
                                   name="date"
                                   id="date"
                                   value="{{ old('date') }}"
                                   autocomplete="date"
                                   required
                            >

                            @error('date')
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
