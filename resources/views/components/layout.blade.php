<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Meta Tags -->
    <meta name="description" content="PocketPal is  is a modern finance tracking platform made for students by students
        that changes how students use financial data to track their expenses."
    >
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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
    <nav class="flex justify-between items-center bg-white px-3 ">
            @auth
            <div class=" flex items-center gap-3">
                <a href="{{ route('home') }}" class="text-sm font-bold">Dashboard</a>
                <a href="{{ route('transactions') }}" class="text-sm font-bold">Records</a>
                <a href="{{ route('reports') }}" class="text-sm font-bold">Analytics</a>
                <a href="{{ route('budget.create') }}" class="text-sm font-bold">Budget</a>
            </div>

            <div class=" flex items-center gap-3">
                <a href="{{ route('expense.create') }}" class="text-sm  rounded-full bg-blue-400
                py-1 px-3 text-white">+ Record</a>
                <x-dropdown>
                    <x-slot name="trigger" >
                        <div class="flex flex-row gap-1 items-center">
                            @if(auth()->user()->profile_image)
                                <img class="h-12 w-12 rounded-full"
                                     src="{{ asset('storage/profile_images') }}/{{
                                                auth()->user()->profile_image }}" alt="profile picture"
                                >
                            @else
                                <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                                </svg>
                            @endif
                            <button class=" text-sm font-bold">{{ auth()->user()->name }} </button>
                                <i class='bx bxs-chevron-down' ></i>
                        </div>
                    </x-slot>

{{--                    @admin--}}
{{--                    <x-dropdown-item href="" :active="request()->is('admin/dashboard')">--}}
{{--                        Dashboard--}}
{{--                    </x-dropdown-item>--}}
{{--                    @endadmin--}}
{{--                    <x-dropdown-item href="{{ route('category.create') }}">--}}
{{--                        Add Category--}}
{{--                    </x-dropdown-item>--}}

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
