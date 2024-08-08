<x-main>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <caption
                class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Welcome {{ $user->name }}
                @if (session()->has('success'))
                    <p>{{ session()->get('success') }}</p>
                @endif

            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Your Email Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ $user->email }}
                    </th>
                </tr>
            </thead>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Balance
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ $user->balance }}
                    </th>
                </tr>
            </thead>
        </table>
    </div>

</x-main>
