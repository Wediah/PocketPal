<x-layout>
    <section class="p-4 sm:ml-64 md:mt-14">
        <div class="bg-blue-300 rounded-xl p-8">
            <div class="bg-blue-400 p-6 rounded-xl  text-white flex md:flex-row flex-col justify-between items-center">
                <h1 class="font-bold md:text-3xl text-2xl">Reports</h1>
                <div>
                    <h2 class="font-bold text-lg pb-2 md:text-left text-center">Select a range</h2>
                    <form action="{{ route('reports') }}" method="GET" class="flex md:flex-row flex-col gap-3
                   ">
                        <div class="flex gap-2 items-center">
                            <label for="start_date">Start Date:</label>
                            <input type="date" name="start_date" id="start_date" class="rounded-xl bg-blue-200 p-2"
                                   value="{{
                        $startDate
                        }}" required>
                        </div>
                        <div class="flex gap-2 items-center">
                            <label for="end_date">End Date:</label>
                            <input type="date" name="end_date" id="end_date" class="rounded-xl bg-blue-200 p-2 "
                                   value="{{
                        $startDate }}"
                                   required>
                        </div>
                        <button type="submit" class="bg-blue-900 rounded-xl p-2 text-sm">Generate Report</button>
                    </form>
                </div>
            </div>

            <div class="flex flex-col gap-3 mt-4 text-white">
                <h2 class="text-sm md:text-xl font-semibold">Total Expenses</h2>
                <h1 class="text-2xl md:text-6xl font-bold">GH₵{{ number_format($totalExpenses, 2) }}</h1>
            </div>

            <canvas id="expensesChart" width="550" height="600" class="mt-4"></canvas>
        </div>

        <div class="bg-white rounded-xl bg-gray-50 p-4 md:p-8 mt-8">
            <h1 class="text-2xl md:text-4xl font-bold">Most Spent</h1>
            @foreach($expenses as $expense)
                <div class="flex flex-row justify-between p-4 mt-4 items-center">
                    <div class="flex flex-row-reverse items-center gap-2">
                        <p class="font-semibold">{{ $expense->category->name }}</p>
                        <img class="h-12 w-12 bg-gray-100 p-1 rounded-md"
                             src="{{ asset('storage/images') }}/{{ $expense->category->image }}" alt="profile picture"
                        >
                    </div>
                    <p class="text-red-400 text-right">GH₵ {{ number_format( $expense->total_amount, 2) }}</p>
                </div>
            @endforeach
        </div>



        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var ctx = document.getElementById('expensesChart').getContext('2d');
                var expensesChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($expenses->pluck('category.name')),
                        datasets: [{
                            label: 'Total Amount',
                            data: @json($expenses->pluck('total_amount')),
                            backgroundColor: 'rgba(255, 255, 255)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            borderRadius: 20

                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>

    </section>
</x-layout>
