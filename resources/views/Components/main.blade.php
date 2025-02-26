<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <nav class="bg-green-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!--
                  Icon when menu is closed.
      
                  Menu open: "hidden", Menu closed: "block"
                -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!--
                  Icon when menu is open.
      
                  Menu open: "block", Menu closed: "hidden"
                -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="{{ route('home') }}"
                                class=" {{ request()->is('home') ? 'bg-gray-900 text-green' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}rounded-md
                                px-3 py-2 text-sm font-medium">HOME</a>
                            <a href="{{ route('deposit') }}"
                                class=" {{ request()->is('deposit') ? 'bg-gray-900 text-green' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}rounded-md
                                px-3 py-2 text-sm font-medium">
                                <Datag>Deposit</Datag>
                            </a>
                            <a href="{{ route('withdraw') }}"
                                class=" {{ request()->is('withdraw') ? 'bg-gray-900 text-green' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}rounded-md px-3 py-2 text-sm font-medium">WithDraw</a>
                            <a href="{{ route('transfer') }}"
                                class=" {{ request()->is('transfer') ? 'bg-gray-900 text-green' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}rounded-md px-3 py-2 text-sm font-medium">
                                <Datag>Transfer</Datag>
                            </a>
                            <a href="{{ route('statement') }}"
                                class=" {{ request()->is('statment') ? 'bg-gray-900 text-green' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}rounded-md px-3 py-2 text-sm font-medium">
                                <Datag>Statement</Datag>
                            </a>
                            <a href="{{ route('logout') }}"
                                class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                                <Datag>Logout</Datag>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">


                    </div>
                </div>
            </div>
        </div>
    </nav>
    {{ $slot }}
</body>

</html>
