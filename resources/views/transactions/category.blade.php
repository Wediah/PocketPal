<x-layout>
    <main class="p-4 sm:ml-64">
        <div class="bg-blue-900 p-12  rounded-xl justify-center">
            <h1 class="text-blue-400 md:text-8xl text-3xl text-center font-bold">{{ $categories->name }}</h1>
        </div>

        @if($expenses->isEmpty())
            <p class="text-gray-600 text-center p-4">No expenses found for the selected period.</p>
        @else
            {{--        <table class="min-w-full">--}}
            {{--            <thead>--}}
            {{--            <tr class="flex flex-row justify-between rounded-xl p-4 mt-4">--}}
            {{--                <th class="py-2 px-4">Date</th>--}}
            {{--                <th class="py-2 px-4">Amount</th>--}}
            {{--                <th class="py-2 px-4">Item</th>--}}
            {{--                <th class="py-2 px-4">Payee</th>--}}

            {{--            </tr>--}}
            {{--            </thead>--}}
            {{--            <tbody>--}}
            @foreach($expenses as $expense)
                {{--                <tr class="flex flex-row justify-between bg-white rounded-xl p-4 mt-4">--}}
                {{--                    <td class="py-2 px-4">{{ $expense->date }}</td>--}}
                {{--                    <td class="py-2 px-4">GH₵ {{ $expense->amount }}</td>--}}
                {{--                    <td class="py-2 px-4">{{ $expense->item }}</td>--}}
                {{--                    <td class="py-2 px-4">{{ $expense->payee }}</td>--}}
                {{--                </tr>--}}
                <div class="flex flex-row justify-between bg-white rounded-xl p-4 mt-4 items-center">
                    <div class="flex flex-row-reverse items-center gap-2">
                        <p class="font-bold text-xl">{{ $expense->item }}</p>
                        <img class="h-12 w-12 bg-gray-100 p-1 rounded-md"
                             src="{{ asset('storage/images') }}/{{ $expense->category->image }}" alt="profile picture"
                        >
                    </div>
                    <p>{{ $expense->payee }}</p>
                    {{--                    <p>{{ $expense->payments->name }}</p>--}}
                    <p class="text-red-400 font-semibold text-lg">GH₵ {{ number_format($expense->amount, 2) }}</p>
                </div>
            @endforeach
            {{--            </tbody>--}}
            {{--        </table>--}}
        @endif
    </main>
</x-layout>
