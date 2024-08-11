<x-layout>
<section class="p-4 sm:ml-64 md:mt-14">

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

    <div class="flex flex-row overflow-scroll gap-4">
        <a href="" ><button class="p-2 border-2 rounded-xl border-blue-400 bg-blue-400 text-white
        hover:bg-blue-400 px-6">All</button></a>
        @foreach($categories as $category)
            <a href="{{ route('transactions.category', ['slug' => $category->slug]) }}" >
                <button class="p-2 px-6 border-2 whitespace-nowrap rounded-xl border-blue-400 hover:text-white
                hover:bg-blue-400">
                    {{ $category->name }}
                </button>
            </a>
        @endforeach
    </div>

    @if($expenses->isEmpty())
        <p class="text-gray-600 text-center p-4">No expenses found for the selected period.</p>
    @else
            @foreach($expenses as $expense)
                <div class="flex flex-row justify-between bg-white rounded-xl p-4 mt-4 items-center">
                    <div class="flex flex-row-reverse items-center gap-2">
                        <p class="font-semibold text-md md:text-xl">{{ $expense->item }}</p>
                        <img class="h-12 w-12 bg-gray-100 p-1 rounded-md"
                             src="{{ asset('storage/images') }}/{{ $expense->category->image }}" alt="profile picture"
                        >
                    </div>
                    <p>{{ $expense->payee }}</p>
                    <p class="text-red-400 font-semibold text-md md:text-lg">GH₵ {{ number_format($expense->amount, 2)
                    }}</p>
                </div>
            @endforeach


    @endif
</section>
</x-layout>
