<x-poll-layout>
    <div class="w-full lg:max-w-1/2 mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <a class="underline text-md text-indigo-600 dark:text-indigo-500 hover:text-indigo-900 dark:hover:text-indigo-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('polls.index') }}">
            {{ __('Back') }}
        </a>
        <h2 class="text-xl/7 font-semibold text-gray-900 dark:text-white">{{ $poll->question }}</h2>
        <p class="mt-1 text-sm/6 text-gray-600 dark:text-gray-200">{{ $poll->details }}</p>
        <p class="mt-1 text-md/5 text-gray-600 dark:text-gray-200">{{ __('Votes') }}: {{ $votes_count }}</p>
        <div class="mt-5 space-y-2">
            @foreach($poll->options as $option)
            <div class="flex flex-col lg:flex-row gap-4 rounded-lg shadow-xs border border-gray-200 p-4 transition bg-indigo-50 dark:border-gray-700 dark:bg-indigo-700/10">
                <div class="w-full lg:max-w-6/12">
                    <strong class="font-medium text-gray-900 dark:text-white">{{ $option->answer }}</strong>
                    @if($option->extra)
                    <p class="mt-1 text-sm text-pretty text-gray-700 dark:text-gray-200">{{ $option->extra }}</p>
                    @endif
                </div>
                <div class="w-full lg:max-w-5/12 mb-4">
                    <x-progress-bar :percentage="$votes_by_options[$option->id]['percentage']" />
                </div>
                <div class="w-full lg:max-w-1/12">
                    <strong class="font-medium text-gray-700 dark:text-gray-200">{{ $votes_by_options[$option->id]['total'] . ' ' . __('Votes') }}</strong>
                </div>
            </div>
            @endforeach
                </div>
        <div class="flex place-content-center mt-4">
            <x-primary-button type="button" id="btnEndPoll" class="ms-3">
                {{ __('End Poll') }}
            </x-primary-button>
            <div id="end-poll-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full bg-gray-300/85 dark:bg-gray-800/85">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                        <button type="button" class="close-modal absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{ __('Are you sure you want to end this poll?') }}</h3>
                            <button type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                {{__('Yes')}}
                            </button>
                            <button type="button" class="close-modal py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                {{__('Cancel')}}
                            </button>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-poll-layout>