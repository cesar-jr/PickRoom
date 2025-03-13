@props(['jsFile' => "list.js"])
<x-poll-layout :jsFile="$jsFile">
    <div class="w-full lg:max-w-1/2 mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <h2 class="text-xl/7 font-semibold text-gray-900 dark:text-white mb-4">Minhas enquetes</h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between p-4">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                        <x-search-icon class="text-gray-500 dark:text-gray-400" />
                    </div>
                    <input type="text" id="table-search" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Search for items">
                </div>
                <div class="flex place-content-center">
                    <x-primary-button class="ms-3">
                        {{ __('New') }}
                    </x-primary-button>
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Question') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Votes') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            Apple MacBook Pro 17"
                        </td>
                        <td class="px-6 py-4">
                            6
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-indigo-600 dark:text-indigo-500 hover:underline">{{ __('See Results') }}</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            Microsoft Surface Pro
                        </td>
                        <td class="px-6 py-4">
                            2
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-indigo-600 dark:text-indigo-500 hover:underline">{{ __('See Results') }}</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            Magic Mouse 2
                        </td>
                        <td class="px-6 py-4">
                            35
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-indigo-600 dark:text-indigo-500 hover:underline">{{ __('See Results') }}</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget eros arcu. Fusce ut lacus id sem ultrices hendrerit sit amet vitae augue. Nullam non tempor lacus. In feugiat lorem nec urna faucibus interdum. Morbi facilisis odio ac erat lobortis blandit. Pellentesque porttitor, quam vel facilisis consectetur, mauris felis pellentesque odio, a vestibulum orci ligula nec lectus. Morbi at ultrices elit. Vivamus porttitor luctus diam, vitae consectetur lacus lobortis sed.
                        </td>
                        <td class="px-6 py-4">
                            75662
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-indigo-600 dark:text-indigo-500 hover:underline">{{ __('See Results') }}</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="flex flex-col items-center">
                <!-- Help text -->
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900 dark:text-white">1</span> to <span class="font-semibold text-gray-900 dark:text-white">10</span> of <span class="font-semibold text-gray-900 dark:text-white">100</span> Entries
                </span>
                <div class="inline-flex m-2 xs:mt-0">
                    <!-- Buttons -->
                    <button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-500 dark:hover:text-white">
                        <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                        </svg>
                        Prev
                    </button>
                    <button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-500 dark:hover:text-white">
                        Next
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </button>
                </div>
            </div>
            <!-- <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4 m-2" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                    <li class="prevBtn">
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <p href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">...</p>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                    </li>
                    <li class="nextBtn">
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                    </li>
                </ul>
            </nav> -->
        </div>
    </div>
</x-poll-layout>