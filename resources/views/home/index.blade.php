<x-layout>
    <div class="min-h-screen mb-10 mt-4">
        <div class="flex flex-row justify-between">
            <div class="flex flex-row gap-4 items-center">
                @if($user->profile_image)
                    <img class="md:h-24 md:w-24 h-32 w-32 rounded-full"
                         src="{{ asset('storage/profile_images') }}/{{
                                                $user->profile_image }}" alt="profile picture"
                    >
                @else
                    <svg class="h-20 w-20 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                    </svg>
                @endif
                <div class="flex flex-col ">
                    <p class="text-xl md:text-md">Hello</p>
                    <p class="font-bold text-2xl md-text-xl">{{ $user->name }}</p>
                </div>
            </div>
            <p class="text-blue-400"><i class='bx bxs-bell-ring'></i></p>
        </div>

        <!-- Form to select month and year -->
        <div class="rounded-xl bg-blue-900 p-12 text-white relative mt-4">
            <div class="flex flex-row flex-row-reverse justify-between">
                <form method="GET" action="{{ route('home') }}">
                    <select class="bg-blue-900 text-white font-semibold" name="month" id="month">
                        @foreach(range(1, 12) as $m)
                            <option class="bg-white text-blue-900" value="{{ $m }}" {{ $m == $month ? 'selected' : ''
                             }}>
                                {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                            </option>
                        @endforeach
                    </select>

                    <select class="bg-blue-900 text-white font-semibold" name="year" id="year">
                        @foreach(range(date('Y') - 5, date('Y')) as $y)
                            <option class="bg-white text-blue-900" value="{{ $y }}" {{ $y == date('Y') ? 'selected' : '' }}>
                                {{ $y }}
                            </option>
                        @endforeach
                    </select>

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
                    <div class="flex flex-row justify-between bg-gray-100 rounded-xl p-4 mt-4">
                        <p class="font-bold">{{ $expense->item }}</p>
                        <p class="text-red-400">GH₵ {{ $expense->amount }}</p>
                    </div>
            @endforeach
        </div>
    </div>
</x-layout>
