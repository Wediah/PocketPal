<x-layout>
<section class="my-8">

    <form method="GET" action="{{ route('transactions') }}" class="mb-6">
        <div class="flex flex-col md:flex-row bg-blue-900 p-12  rounded-xl justify-center text-white">
            <select class="bg-blue-900 text-blue-400 font-semibold text-8xl" name="month" id="month">
                @foreach(range(1, 12) as $m)
                    <option class="bg-white text-blue-900 text-4xl" value="{{ $m }}" {{ $m == $month ? 'selected' : ''
                             }}>
                        {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                    </option>
                @endforeach
            </select>

            <select class="bg-blue-900 text-blue-400 font-semibold text-8xl" name="year" id="year">
                @foreach(range(date('Y') - 5, date('Y')) as $y)
                    <option class="bg-white text-blue-900 text-4xl" value="{{ $y }}" {{ $y == date('Y') ? 'selected'
                    : '' }}>
                        {{ $y }}
                    </option>
                @endforeach
            </select>
            <div class="flex items-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700">Filter</button>
            </div>
        </div>
    </form>

    <div class="flex flex-row flex-wrap gap-4">
        <a href="" ><button class="p-2 border-2 rounded-xl border-blue-400 bg-blue-400 text-white
        hover:bg-blue-400 px-6">All</button></a>
        @foreach($categories as $category)
            <a href="{{ route('transactions.category', ['slug' => $category->slug]) }}" ><button class="p-2 px-6
            border-2
            rounded-xl
            border-blue-400 hover:text-white
            hover:bg-blue-400">{{
            $category->name
            }}</button></a>
        @endforeach
    </div>

    @if($expenses->isEmpty())
        <p class="text-gray-600 text-center p-4">No expenses found for the selected period.</p>
    @else
        <table class="min-w-full">
            <thead>
            <tr class="flex flex-row justify-between  rounded-xl p-4 mt-4">
                <th class="py-2 px-4">Date</th>
                <th class="py-2 px-4">Amount</th>
                <th class="py-2 px-4">Item</th>
                <th class="py-2 px-4">Payee</th>

            </tr>
            </thead>
            <tbody>
            @foreach($expenses as $expense)
                <tr class="flex flex-row justify-between bg-white rounded-xl p-4 mt-4">
                    <td class="py-2 px-4">{{ $expense->date }}</td>
                    <td class="py-2 px-4">GH₵ {{ $expense->amount }}</td>
                    <td class="py-2 px-4">{{ $expense->item }}</td>
                    <td class="py-2 px-4">{{ $expense->payee }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</section>
</x-layout>
