<x-layout>
    <div class="p-4 sm:ml-64 md:mt-14">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <h3 class="text-2xl md:text-xl lg:text-3xl font-bold ">Overview</h3>
            <div class="md:grid md:grid-cols-2 flex flex-col gap-4 my-4 bg-gray-50 p-4 rounded-xl">
                <div class="flex flex-row justify-between items-center bg-white md:p-6 p-4 rounded-xl">
                        <span class="text-green-500 bg-gray-100 p-6 rounded-full text-2xl">
                            <i class='bx bx-down-arrow-alt'></i>
                        </span>
                    <div class="flex flex-col gap-1 text-left">
                        <p class="font-semibold text-lg">Income</p>
                        <p class="font-bold text-lg">GH₵ {{ number_format($income, 2) }}</p>
                    </div>
                </div>
                <div class="flex flex-row justify-between items-center bg-white md:p-6 p-4 rounded-xl">
                        <span class="text-red-500 bg-gray-100 p-6 rounded-full text-2xl">
                            <i class='bx bx-up-arrow-alt'></i>
                        </span>
                    <div class="flex flex-col gap-1 text-left">
                        <p class="font-semibold text-lg">Expense</p>
                        <p class="font-bold text-lg">GH₵ {{ number_format($totalExpenses, 2) }}</p>
                    </div>
                </div>
            </div>
            <div class="gap-4 my-4 bg-gray-50 p-4 rounded-xl">
                <div class="flex justify-between my-3 ">
                    <h3 class="text-2xl md:text-xl lg:text-3xl font-bold ">Accounts</h3>
                    <a href="{{ route('payment.recording') }}" class="flex flex-row  items-center font-semibold
                text-blue-400">manage accounts <i class='bx
                bx-chevron-right'
                        ></i></a>
                </div>

                <div class="flex flex-row overflow-scroll gap-6 items-center rounded-xl">
                    @foreach($payments as $payment)
                        <div class="flex flex-row gap-1 text-center bg-white p-8 rounded-xl items-center">
                            <div>
                                 <span class="text-green-500 p-2 text-2xl">
                                     <i class='bx bxs-bank'></i>
                                </span>
                            </div>
                            <p class="font-semibold text-lg">{{ $payment->name }}</p>
                            <p class="font-bold text-lg ml-12">GH₵ {{ number_format($payment->balance, 2) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="my-4 bg-gray-50 p-4 rounded-xl">
                <div class="flex justify-between">
                    <h3 class="text-2xl md:text-xl lg:text-3xl font-bold my-3">Top Expenses</h3>
                    <a href="{{ route('reports') }}" class="flex flex-row  items-center font-semibold text-blue-400">see
                        more <i class='bx
                    bx-chevron-right'
                        ></i></a>
                </div>

                <div class="flex flex-row overflow-scroll gap-6 pt-4">
                    @foreach($topExpenses as $expense)
                        <div class="flex flex-col gap-2 bg-white p-8 rounded-md justify-center items-center">
                            <img class="h-20 w-20 "
                                 src="{{ asset('storage/images') }}/{{ $expense->category->image }}" alt="profile picture"
                            >
                            <p class="font-semibold text-sm whitespace-nowrap">{{ $expense->category->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="my-4 bg-gray-50 p-4 rounded-xl">
                <h3 class="text-2xl md:text-xl lg:text-3xl font-bold my-3">Recent Expenses</h3>
                @foreach ($expenses as $expense)
                    <div class="flex flex-row justify-between bg-white rounded-xl p-4 mt-4 items-center">
                        <div class="flex flex-row-reverse items-center gap-2">
                            <p class="font-semibold text-xl">{{ $expense->item }}</p>
                            <img class="h-12 w-12 bg-gray-100 p-1 rounded-md"
                                 src="{{ asset('storage/images') }}/{{ $expense->category->image }}" alt="profile picture"
                            >
                        </div>
                        <p class="text-red-400 font-semibold text-lg">GH₵ {{ number_format($expense->amount, 2) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
