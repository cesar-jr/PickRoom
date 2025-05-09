@props(['jsFile' => "poll.js"])
<x-app-layout :jsFile="$jsFile">
    <div class="w-full lg:max-w-1/2 mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <form id="vote" method="POST" action="{{ route('vote.store', ['poll' => $poll->slug]) }}">
            @csrf
            <h2 class="text-xl/7 font-semibold text-gray-900 dark:text-white">{{ $poll->question }}</h2>
            @if($poll->details)
            <p class="mt-1 text-sm/6 text-gray-600 dark:text-gray-200">{{ $poll->details }}</p>
            @endif
            @unless($logged)
            <p class="mt-1 text-sm/6 text-red-500 dark:text-red-200">
                {{ __('You need to') }}
                <a class="content-center underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('vote.login') }}">
                    {{ __('Log in') }}
                </a>
            </p>
            @endunless
            @if($see_results)
            <a class="underline text-md text-indigo-600 dark:text-indigo-500 hover:text-indigo-900 dark:hover:text-indigo-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('polls.show', ['poll' => $poll]) }}">
                {{ __('See Results') }}
            </a>
            @endif
            @foreach($errors->all() as $message)
            <p class="mt-1 text-sm/6 text-red-500 dark:text-red-200">{{ $message }}</p>
            @endforeach
            <div class="mt-5 space-y-10">
                <fieldset class="space-y-2">
                    @if($poll->answer_type==\App\Enums\AnswerType::SINGLE)
                    @foreach($poll->options as $option)
                    <x-poll.radio-input
                        :id="$option->id"
                        name="options[]"
                        :value="$option->id"
                        :disabled="$disabled"
                        :checked="in_array($option->id, $checked)">
                        <p class="text-gray-900 dark:text-white">{{ $option->answer }}</p>
                        @if($option->extra)
                        <p class="mt-1 text-gray-700 dark:text-gray-200">{{ $option->extra }}</p>
                        @endif
                    </x-poll.radio-input>
                    @endforeach
                    @else
                    @foreach($poll->options as $option)
                    <x-poll.checkbox-input
                        :id="$option->id"
                        name="options[]"
                        :value="$option->id"
                        :disabled="$disabled"
                        :checked="in_array($option->id, $checked)">
                        <strong class="font-medium text-gray-900 dark:text-white">{{ $option->answer }}</strong>
                        @if($option->extra)
                        <p class="mt-1 text-sm text-pretty text-gray-700 dark:text-gray-200">{{ $option->extra }}</p>
                        @endif
                    </x-poll.checkbox-input>
                    @endforeach
                    @endif
                </fieldset>
            </div>
            <div class="mt-5 flex place-content-center lg:place-content-end">
                <x-primary-button class="ms-3" :disabled="$disabled" id="btnConfirm">
                    <div class="hidden">
                        <x-spinner class="w-4 h-4 mr-1" />
                    </div>
                    {{ __('Confirm') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>