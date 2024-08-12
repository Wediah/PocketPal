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
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
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
<section class="md:px-6 px-2 py-4">
    <nav>
            @auth
{{--                <div class="flex justify-between items-center bg-white p-3 rounded-xl drop-shadow-xl">--}}
{{--                    <div class=" flex items-center gap-4 hidden md:block">--}}
{{--                        <a href="{{ route('home') }}" class="text-sm font-bold mr-2">Dashboard</a>--}}
{{--                        <a href="{{ route('transactions') }}" class="text-sm font-bold mr-2">Records</a>--}}
{{--                        <a href="{{ route('reports') }}" class="text-sm font-bold">Analytics</a>--}}
{{--                        <a href="{{ route('budget.create') }}" class="text-sm font-bold">Budget</a>--}}
{{--                    </div>--}}

{{--                    <div class="md:hidden">--}}
{{--                        <span class="font-3xl font-bold"><i class='bx bx-menu'></i></span>--}}
{{--                    </div>--}}

{{--                    <div class=" flex items-center gap-3">--}}
{{--                        <a href="{{ route('expense.create') }}" class="text-sm  rounded-full bg-blue-400--}}
{{--                         py-1 px-3 text-white">--}}
{{--                            + Record--}}
{{--                        </a>--}}
{{--                        <x-dropdown>--}}
{{--                            <x-slot name="trigger" >--}}
{{--                                <div class="flex flex-row gap-1 items-center">--}}
{{--                                    @if(auth()->user()->profile_image)--}}
{{--                                        <img class="h-12 w-12 rounded-full"--}}
{{--                                             src="{{ asset('storage/profile_images') }}/{{--}}
{{--                                                auth()->user()->profile_image }}" alt="profile picture"--}}
{{--                                        >--}}
{{--                                    @else--}}
{{--                                        <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"--}}
{{--                                             aria-hidden="true">--}}
{{--                                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />--}}
{{--                                        </svg>--}}
{{--                                    @endif--}}
{{--                                    <button class=" text-sm font-bold">{{ auth()->user()->name }} </button>--}}
{{--                                    <i class='bx bxs-chevron-down' ></i>--}}
{{--                                </div>--}}
{{--                            </x-slot>--}}

{{--                            @admin--}}
{{--                            <x-dropdown-item href="" :active="request()->is('admin/dashboard')">--}}
{{--                                Dashboard--}}
{{--                            </x-dropdown-item>--}}
{{--                            @endadmin--}}
{{--                            <x-dropdown-item href="{{ route('category.create') }}">--}}
{{--                                Add Category--}}
{{--                            </x-dropdown-item>--}}

{{--                            <x-dropdown-item href="{{ route('profile.index') }}">--}}
{{--                                Profile--}}
{{--                            </x-dropdown-item>--}}
{{--                            <x-dropdown-item href="{{ route('logout') }}">--}}
{{--                                Logout--}}
{{--                            </x-dropdown-item>--}}
{{--                        </x-dropdown>--}}

{{--                    </div>--}}
{{--                </div>--}}



            <nav class="md:fixed top-0 z-50 w-full bg-white md:border-b border-gray-200 dark:bg-gray-800
            dark:border-gray-700">
                <div class="px-3 py-3 lg:px-5 lg:pl-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center justify-start rtl:justify-end">
                            <a href="{{ route('home') }}" class="flex ms-2 md:me-24 items-center">
                                <img src="{{ asset('images/wallet.png') }}" class="h-8 me-3 pr-1" alt="PocketPal
                                Logo" />
                                <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap
                                dark:text-white">PocketPal</span>
                            </a>
                        </div>
                        <div class="flex items-center md:block hidden">
                            <div class="flex items-center ms-3 px-3 md:px-5">
                                <div>
                                    <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                        <span class="sr-only">Open user menu</span>
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
                                    </button>
                                </div>
                                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                                    <div class="px-4 py-3" role="none">
                                        <p class="text-sm text-gray-900 dark:text-white" role="none">
                                            Neil Sims
                                        </p>
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                            neil.sims@flowbite.com
                                        </p>
                                    </div>
                                    <ul class="py-1" role="none">
                                        <li>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Earnings</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform
            -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800
            dark:border-gray-700 md:block hidden" aria-label="Sidebar">
                <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
                    <ul class="space-y-2 font-medium">
                        <li>
                            <a href="{{ route('home') }}" class="flex items-center  p-2 text-gray-900 rounded-lg
                            dark:text-white
                            hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class='bx bxs-dashboard' ></i>
                                <span class="ms-3 ml-2">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('expense.create') }}" class="flex items-center  p-2 text-gray-900 rounded-lg
                            dark:text-white
                            hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class='bx bxs-file-plus'></i>
                                <span class="ms-3 ml-2">Record Expenses</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('transactions') }}" class="flex items-center p-2 text-gray-900 rounded-lg
                            dark:text-white
                            hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class='bx bxs-report'></i>
                                <span class="flex-1 ms-3 whitespace-nowrap ml-2">Records</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('reports') }}" class="flex items-center p-2 text-gray-900 rounded-lg
                            dark:text-white
                            hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class='bx bx-bar-chart'></i>
                                <span class="flex-1 ms-3 whitespace-nowrap ml-2">Analytics</span>
                            </a>
                        </li>
{{--                        <li>--}}
{{--                            <a href="{{ route('budget.create') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">--}}
{{--                                <i class='bx bx-bar-chart'></i>--}}
{{--                                <span class="flex-1 ms-3 whitespace-nowrap ml-2">Budget</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li>
                            <a href="{{ route('category.create') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class='bx bx-category'></i>
                                <span class="flex-1 ms-3 whitespace-nowrap ml-3">Expense Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class='bx bx-user'></i>
                                <span class="flex-1 ms-3 whitespace-nowrap ml-3">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class='bx bx-log-out-circle'></i>
                                <span class="flex-1 ms-3 whitespace-nowrap ml-3">Sign Out</span>
                            </a>
                        </li>
                    </ul>
                    <div id="dropdown-cta" class="p-4 mt-6 rounded-lg bg-blue-50 dark:bg-blue-900" role="alert">
                        <div class="flex items-center mb-3">
                            <span class="bg-blue-400 text-orange-800 text-sm font-semibold me-2 px-2.5 py-0.5 mr-3
                            rounded">Beta</span>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 inline-flex justify-center items-center w-6 h-6 text-blue-900 rounded-lg focus:ring-2 focus:ring-blue-400 p-1 hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-400 dark:hover:bg-blue-800" data-dismiss-target="#dropdown-cta" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                        <p class="mb-3 text-sm text-blue-800 dark:text-blue-400">
                            You are using the public beta of PocketPal. We are still developing exciting features,
                            which will be released in the near future. Kindly feel free to share your thoughts with
                            on some features you want to see on PocketPal.
                        </p>
                        <a class="text-sm text-blue-800 underline font-medium hover:text-blue-900 dark:text-blue-400
                        dark:hover:text-blue-300" href="#">Contact us</a>
                    </div>
                </div>
            </aside>

        @else
                <nav class="flex justify-between items-center bg-white p-3 rounded-xl drop-shadow-xl">
                    <a href="{{ route('help') }}" class="text-xs md:font-bold md:uppercase">
                        Help Center
                    </a>

                    <a href="/" class="md:text-lg text-xs font-bold ">PocketPal</a>

                    <div class=" flex items-center gap-3">
                        <a href="{{ route('login') }}" class="text-xs font-bold text-white md:text-black uppercase
                        md:bg-white bg-blue-400 md:p-0 p-2 rounded-md">Login</a>

                        <a href="{{ route('register') }}" class="bg-black md:block hidden rounded-md text-xs font-semibold
                        text-white uppercase
                        py-2 px-3">
                            Get Started
                        </a>
                    </div>
                </nav>
            @endauth
    </nav>

    {{ $slot }}

    @auth
        <div class="fixed w-screen z-50 h-16 mx-auto bg-white border border-gray-200
        bottom-4 left-0 mx-10 dark:bg-gray-700 dark:border-gray-600 md:hidden rounded-full">
            <div class="grid h-full max-w-lg grid-cols-5 mx-auto rounded-full">
                <button data-tooltip-target="tooltip-home" type="button" class="inline-flex flex-col items-center justify-center px-5 rounded-s-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <a href="{{ route('home') }}">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    </a>
                    <span class="sr-only">Home</span>
                </button>
                <div id="tooltip-home" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Home
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-wallet" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <a href="{{ route('transactions') }}">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M11.074 4 8.442.408A.95.95 0 0 0 7.014.254L2.926 4h8.148ZM9 13v-1a4 4 0 0 1 4-4h6V6a1 1 0 0 0-1-1H1a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1v-2h-6a4 4 0 0 1-4-4Z"/>
                        <path d="M19 10h-6a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1Zm-4.5 3.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM12.62 4h2.78L12.539.41a1.086 1.086 0 1 0-1.7 1.352L12.62 4Z"/>
                    </svg>
                    </a>
                    <span class="sr-only">Reports</span>
                </button>
                <div id="tooltip-wallet" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Reports
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <div class="flex items-center justify-center">
                    <button data-tooltip-target="tooltip-new" type="button" class="inline-flex items-center justify-center w-10 h-10 font-medium bg-blue-600 rounded-full hover:bg-blue-700 group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
                        <a href="{{ route('expense.create') }}">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                        </a>
                        <span class="sr-only">New expense</span>
                    </button>
                </div>
                <div id="tooltip-new" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Create new expense
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-settings" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <a href="{{ route('reports') }}">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2"/>
                    </svg>
                    </a>
                    <span class="sr-only">Analytics</span>
                </button>
                <div id="tooltip-settings" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Analytics
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-profile" type="button" class="inline-flex flex-col items-center justify-center px-5 rounded-e-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <a href="{{ route('profile.index') }}">
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
                    </a>
                    <span class="sr-only">Profile</span>
                </button>
                <div id="tooltip-profile" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Profile
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>


    @else
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
    @endauth
</section>


</body>
