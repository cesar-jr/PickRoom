@props(['jsFile' => "result.js"])
<x-app-layout :jsFile="$jsFile">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Results') }}
        </h2>
    </x-slot>
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
                    <x-progress-bar :percentage="$votes_by_options[$option->id]['percentage'] ?? 0" />
                </div>
                <div class="w-full lg:max-w-1/12">
                    <strong class="font-medium text-gray-700 dark:text-gray-200">{{ ($votes_by_options[$option->id]['total'] ?? 0) . ' ' . __('Votes') }}</strong>
                </div>
            </div>
            @endforeach
        </div>
        <div class="flex place-content-center mt-4">
            <x-primary-button type="button" :disabled="!$poll->active" data-confirm-modal="end-poll" class="ms-3">
                {{ __('End Poll') }}
            </x-primary-button>
            @if($poll->active)
            <form id="deactivate" action="{{ route('polls.update', ['poll' => $poll->slug]) }}" method="POST" class="hidden">
                @csrf
                @method('PATCH')
                <input type="hidden" name="active" value="0">
            </form>
            <x-confirm-modal id="end-poll" :question="__('Are you sure you want to end this poll?')" />
            @endif
        </div>
    </div>
</x-app-layout>