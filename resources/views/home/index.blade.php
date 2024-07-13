<x-layout>
    <section class="my-8">
        <!-- Form to select month and year -->
        <div class="rounded-xl bg-blue-900 p-12 text-white relative mt-4">
            <div class="flex flex-row flex-row-reverse justify-between">
                <form method="GET" action="{{ route('home') }}" class="flex flex-row gap-1 items-end">

                    <div class="flex flex-col gap-2">
                        <div class=" gap-1">
                            <label for="start_date">Start Date:</label>
                            <input type="date" class="bg-blue-400 rounded-md p-1" id="start_date" name="start_date"
                                   value="{{ request('start_date', $startDate->toDateString()) }}">
                        </div>

                        <div class="gap-1">
                            <label for="end_date">End Date:</label>
                            <input type="date" class="bg-blue-400 rounded-md p-1" id="end_date" name="end_date"
                                   value="{{ request
                        ('end_date',
                        $endDate->toDateString()) }}">
                        </div>
                    </div>


                    <button class="bg-blue-400 text-white font-semibold p-1 rounded-md" type="submit">Filter</button>
                </form>

                <p>{{ number_format($percentage, 2) }}% Spent</p>

                <div class="">
                    <div class="flex flex-col gap-2">
                        <p>Total Budget</p>
                        <p>GH₵ {{ $totalBudget }}</p>
                    </div>
                </div>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-6 mt-4">
                <div class="bg-blue-600 h-6 rounded-full" style="width: {{ $percentage }}%"></div>
            </div>

            <div class="flex justify-center">
                <div class="bg-blue-400 mt-6 rounded-xl absolute p-8 px-36 flex flex-row justify-between w-11/12
            items-center">
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-lg">Balance</p>
                        <p class="font-bold text-lg">GH₵ {{ $balance }}</p>
                    </div>
                    <div
                        class="inline-block h-[250px] min-h-[1em] w-0.5 self-stretch bg-white"></div>
                    <div class="flex flex-col gap-2 text-center">
                        <p class="font-semibold text-lg">Expense</p>
                        <p class="font-bold text-lg">GH₵ {{ $totalExpenses }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-32" >
            <h3 class="text-4xl md:text-xl lg:text-3xl font-bold ">Recent Expenses</h3>
            @foreach ($expenses as $expense)
                <div class="flex flex-row justify-between bg-white rounded-xl p-4 mt-4">
                    <p class="font-bold">{{ $expense->item }}</p>
                    <p class="text-red-400">GH₵ {{ $expense->amount }}</p>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>
