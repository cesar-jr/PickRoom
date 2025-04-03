@props(['jsFile' => "poll-create.js"])
<x-poll-layout :jsFile="$jsFile">
    <div class="w-full lg:max-w-1/2 mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <a class="underline text-md text-indigo-600 dark:text-indigo-500 hover:text-indigo-900 dark:hover:text-indigo-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('polls.index') }}">
            {{ __('Back') }}
        </a>
        <form method="POST" action="{{ route('polls.store') }}">
            @csrf
            <h2 class="text-xl/7 font-semibold text-gray-900 dark:text-white">{{ __('New Question') }}</h2>
            <p class="mt-1 text-sm/6 text-gray-600 dark:text-gray-200">{{ __('Launch a new poll') }}</p>
            <div class="mt-3">
                <x-input-label for="question" :value="__('Question')" />
                <x-poll.text-input name="question" id="question" :value="old('question')" required autofocus />
                <x-input-error :messages="$errors->get('question')" class="mt-2" />
            </div>
            <div class="mt-3">
                <x-input-label for="details" :value="__('Details')" />
                <x-poll.textarea-input name="details" id="details" rows="3">{{old('details')}}</x-poll.textarea-input>
                <x-input-error :messages="$errors->get('details')" class="mt-2" />
            </div>
            <div class="mt-3">
                <fieldset class="flex gap-4">
                    <legend class="block text-sm/6 font-medium text-gray-700 dark:text-gray-300">{{ __('Single or multiple answers?') }}</legend>
                    <x-poll.radio-input name="answerType"
                        value="SINGLE"
                        id="SingleAnswer"
                        :checked="old('answerType')!='MULTIPLE'">
                        <p class="mt-1 text-gray-900 dark:text-white">{{ __('Single') }}</p>
                    </x-poll.radio-input>
                    <x-poll.radio-input name="answerType"
                        value="MULTIPLE"
                        id="MultipleAnswer"
                        :checked="old('answerType')=='MULTIPLE'">
                        <p class="mt-1 text-gray-900 dark:text-white">{{ __('Multiple') }}</p>
                    </x-poll.radio-input>
                </fieldset>
                <x-input-error :messages="$errors->get('answerType')" class="mt-2" />
            </div>
            <h3 class="mt-4 font-bold text-base text-gray-900 dark:text-white">{{ __('Options') }}</h3>
            <div class="mt-2">
                <div id="optionsList">
                    @for( $i=0; $i < count( old('answer') ?? [0] ); $i++ )
                        <div class="clone">
                        <div class="flex gap-2 flex-col lg:flex-row">
                            <div class="flex gap-2">
                                <p class="text-sm text-gray-600 dark:text-gray-200">{{ __('Option') }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-200 num">{{$i + 1}}</p>
                            </div>
                            <div class="w-full lg:w-4/5">
                                <div class="w-full">
                                    <x-poll.text-input class="answer" :name="'answer[' . $i . ']'" :value="old('answer.' . $i)" required autofocus placeholder="{{__('Answer')}}" />
                                    <x-input-error :messages="$errors->get('answer.' . $i)" class="errors" />
                                </div>
                                <div class="w-full">
                                    <x-poll.text-input class="additional" :name="'additional[' . $i . ']'" :value="old('additional.' . $i)" autofocus placeholder="{{__('Additional text')}}" />
                                    <x-input-error :messages="$errors->get('additional.' . $i)" class="errors" />
                                </div>
                            </div>
                            <div class="flex place-content-center divDelete">
                                <x-secondary-button class="ms-3 h-fit btnDelete">
                                    <x-trash-icon />
                                </x-secondary-button>
                            </div>
                        </div>
                        <div class="border border-gray-900 my-2"></div>
                </div>
                @endfor
            </div>
            <div class="flex place-content-center mt-4">
                <x-secondary-button class="ms-3" id="btnNewOption">
                    {{ __('New Option') }}
                </x-secondary-button>
            </div>
    </div>

    <div class="mt-5 space-y-5 lg:space-y-0 flex flex-col lg:flex-row lg:place-content-end">
        <div class="flex place-content-center">
            <x-secondary-button class="ms-3">
                {{ __('Preview') }}
            </x-secondary-button>
        </div>
        <div class="flex place-content-center">
            <x-primary-button class="ms-3">
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </div>
    </form>
    </div>
</x-poll-layout>