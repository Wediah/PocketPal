<x-layout>
    <main class="p-4">
        <div class="bg-blue-900 p-12  rounded-xl justify-center">
            <h1 class="text-blue-400 md:text-8xl text-3xl text-center font-bold">{{ $categories->name }}</h1>
        </div>

        @if($expenses->isEmpty())
        <p class="text-gray-600">No expenses found for the selected period.</p>
        @else
        <table class="min-w-full bg-white">
            <thead>
            <tr class="flex flex-row justify-between  rounded-xl p-4 mt-4">
                <th class="py-2 px-4">Date</th>
                <th class="py-2 px-4">Amount</th>
                <th class="py-2 px-4">Item</th>
            </tr>
            </thead>
            <tbody>
            @foreach($expenses as $expense)
            <tr class="flex flex-row justify-between bg-gray-100 rounded-xl p-4 mt-4">
                <td class="py-2 px-4">{{ $expense->created_at->format('Y-m-d') }}</td>
                <td class="py-2 px-4">GH₵ {{ $expense->amount }}</td>
                <td class="py-2 px-4">{{ $expense->item }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $expenses->links() }}
        </div>
        @endif
    </main>
</x-layout>
