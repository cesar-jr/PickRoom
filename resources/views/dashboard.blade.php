<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="w-full lg:max-w-1/2 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center p-3 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <div class="flex justify-center p-3 text-gray-900 dark:text-gray-100">
                    <!-- trocar esse texto para translation plural depois -->
                    {{ trans_choice("messages.voted_on_pre", $votes_count) }}
                    @if($votes_count)
                    <p class="mx-1 text-rose-600 dark:text-lime-400">{{ $votes_count }}</p>
                    {{ trans_choice("messages.voted_on_pos", $votes_count) }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>