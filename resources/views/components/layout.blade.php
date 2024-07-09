<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Meta Tags -->
    <meta name="description" content="PocketPal is  is a modern finance tracking platform made for students by students
that changes how students use financial data to track their expenses.">
    <meta name="keywords" content="budgeting, expense tracking, savings, financial awareness">
    <meta name="author" content="Wediah Emmanuel">

    <title>PocketPal</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>


<style>
    html {
        scroll-behavior: smooth;
    }
    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .clamp.ome-line {
        -webkit-line-clamp: 1;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-4 bg-zinc-200">
    <nav class="flex justify-between items-center ">
            @auth
{{--                        <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}</button>--}}
            <div class=" flex items-center gap-3">
                <a href="{{ route('home') }}" class="text-sm font-bold uppercase">Home</a>
                <a href="{{ route('transactions') }}" class="text-sm font-bold uppercase">Transactions</a>
                <a href="{{ route('reports') }}" class="text-sm font-bold uppercase">Reports</a>
            </div>

{{--            <a href="{{ route('budget.show') }}" class="text-lg font-bold ">PocketPal</a>--}}

            <div class=" flex items-center gap-3">
                <a href="{{ route('expense.create') }}" class="text-sm font-bold uppercase">Add Expense</a>
                <a href="{{ route('budget.create') }}" class="text-sm font-bold uppercase">Add Budget</a>
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="bg-black rounded-md text-sm font-semibold text-white uppercase
                        py-2 px-3">Welcome, {{ auth()->user()->name }}</button>
                    </x-slot>

{{--                    @admin--}}
{{--                    <x-dropdown-item href="" :active="request()->is('admin/dashboard')">--}}
{{--                        Dashboard--}}
{{--                    </x-dropdown-item>--}}
{{--                    @endadmin--}}
                    <x-dropdown-item href="{{ route('category.create') }}">
                        Add Category
                    </x-dropdown-item>

                    <x-dropdown-item href="{{ route('profile.index') }}">
                        Profile
                    </x-dropdown-item>
                    <x-dropdown-item href="{{ route('logout') }}">
                        Logout
                    </x-dropdown-item>
                </x-dropdown>

            </div>


            @else
                <a href="{{ route('help') }}" class="text-xs font-bold uppercase">
                    Help Center
                </a>

                <a href="/" class="text-lg font-bold ">PocketPal</a>

                <div class=" flex items-center gap-3">
                    <a href="{{ route('login') }}" class="text-xs font-bold uppercase">Login</a>

                    <a href="{{ route('register') }}" class="bg-black rounded-md text-xs font-semibold text-white uppercase
                    py-2 px-3">
                        Get Started
                    </a>
                </div>
            @endauth
    </nav>

    {{ $slot }}

    <footer id="newsletter" class=" bottom-4 left-6 right-6 bg-blue-900  rounded-xl text-center p-8
    mt-5">
        <div class="flex flex-col md:flex-row md:justify-between">
            <div class="flex flex-col md:flex-row md:gap-14 gap-4 text-left">
                <div class="flex flex-col gap-1">
                    <h4 class="text-md font-md text-gray-500">Personal</h4>
                    <a href="" class="text-sm text-gray-200">Transactions</a>
                    <a href="" class="text-sm text-gray-200">Reports</a>
                    <a href="" class="text-sm text-gray-200">Add Expense</a>
                </div>
                <div class="flex flex-col gap-1">
                    <h4 class="text-md font-md text-gray-500">Info</h4>
                    <a href="" class="text-sm text-gray-200">+233 204868516</a>
                    <a href="" class="text-sm text-gray-200">hello@pocketpal.com</a>
                </div>
            </div>

            <div class="flex flex-col gap-1 md:text-right text-left mt-4 md:mt-0">
                @auth
                    <h4 class="text-md font-md text-gray-500">Address</h4>
                @else
                    <a href="" class="bg-blue-400 rounded-md text-xs text-center font-semibold text-white uppercase py-2
                     px-3">
                        Get Started
                    </a>
                @endauth
                <a href="{{ route('register') }}" class="text-sm text-gray-200">23rd  Akwesi Ampim Rd. Accra</a>
                <h4 class="text-sm text-gray-200">Greater Accra, Ghana</h4>
            </div>


        </div>
        <div class="flex md:flex-row flex-col justify-between mt-2">
            <h3 class="text-sm text-gray-500">2024 - Copyright</h3>
            <a href="{{ route('privacy') }}" class="text-sm text-gray-500">Privacy</a>
        </div>
    </footer>
</section>


</body>
