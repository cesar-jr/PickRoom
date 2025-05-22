@props(['jsFile' => "public-list.js"])
<x-app-layout :jsFile="$jsFile">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Polls') }}
        </h2>
    </x-slot>
    <div class="w-full lg:max-w-1/2 mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between p-4">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                        <x-icons.search class="text-gray-500 dark:text-gray-400" />
                    </div>
                    <input type="text" id="table-search" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="{{ __('Search') }}">
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Question') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Action') }}
                        </th>
                    </tr>
                </thead>
                <tbody id="tableList">
                    <tr class="original bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 question sm:w-10/12">
                            Mock
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="action-results font-medium text-indigo-600 dark:text-indigo-500 hover:underline">{{ __('See Results') }}</a>
                            <a href="#" class="action-vote font-medium text-indigo-600 dark:text-indigo-500 hover:underline">{{ __('Vote') }}</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div role="status" class="text-center m-4 loading">
                <x-spinner class="w-8 h-8" />
                <span class="sr-only">Loading...</span>
            </div>
            <div class="flex flex-col items-center">
                <!-- Help text -->
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    {{ __('Showing') }} <span class="font-semibold text-gray-900 dark:text-white" id="from">1</span> {{ __('to') }} <span class="font-semibold text-gray-900 dark:text-white" id="to">10</span> {{ __('of') }} <span class="font-semibold text-gray-900 dark:text-white" id="total">100</span> {{ __('Entries') }}
                </span>
                <div class="inline-flex m-2 xs:mt-0">
                    <!-- Buttons -->
                    <button id="btnPrev" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-500 dark:hover:text-white disabled:opacity-25">
                        <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                        </svg>
                        {{ __('Prev') }}
                    </button>
                    <button id="btnNext" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-500 dark:hover:text-white disabled:opacity-25">
                        {{ __('Next') }}
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>