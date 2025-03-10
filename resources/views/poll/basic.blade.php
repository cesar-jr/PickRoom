<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/pages/poll.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>
        <div class="w-full lg:max-w-1/2 mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form action="">
                <h2 class="text-xl/7 font-semibold text-gray-900 dark:text-white">Pergunta aqui</h2>
                <p class="mt-1 text-sm/6 text-gray-600 dark:text-gray-200">Detalhes aqui</p>
                <div class="mt-10 space-y-10">
                    <fieldset>
                        <div class="mt-6 space-y-2">
                            <label
                                for="Option1"
                                class="flex cursor-pointer items-start gap-4 rounded-lg shadow-xs border border-gray-200 p-4 transition hover:bg-gray-50 has-[:checked]:bg-indigo-50 dark:border-gray-700 dark:hover:bg-gray-900 dark:has-[:checked]:bg-indigo-700/10">
                                <div class="group grid size-4 grid-cols-1 mt-1">
                                    <input
                                        type="checkbox"
                                        class="col-start-1 row-start-1 size-4 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto"
                                        id="Option1" />
                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                        <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>

                                <div>
                                    <strong class="font-medium text-gray-900 dark:text-white"> John Clapton </strong>

                                    <p class="mt-1 text-sm text-pretty text-gray-700 dark:text-gray-200">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    </p>
                                </div>
                            </label>

                            <label
                                for="Option2"
                                class="flex cursor-pointer items-start gap-4 rounded-lg shadow-xs border border-gray-200 p-4 transition hover:bg-gray-50 has-[:checked]:bg-indigo-50 dark:border-gray-700 dark:hover:bg-gray-900 dark:has-[:checked]:bg-indigo-700/10">
                                <div class="group grid size-4 grid-cols-1 mt-1">
                                    <input
                                        type="checkbox"
                                        class="col-start-1 row-start-1 size-4 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto"
                                        id="Option2" />
                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                        <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>

                                <div>
                                    <strong class="font-medium text-gray-900 dark:text-white"> Peter Mayer </strong>

                                    <!-- <p class="mt-1 text-sm text-pretty text-gray-700 dark:text-gray-200">
                                        Lorem ipsum dolor sit amet consectetur.
                                    </p> -->
                                </div>
                            </label>

                            <label
                                for="Option3"
                                class="flex cursor-pointer items-start gap-4 rounded-lg shadow-xs border border-gray-200 p-4 transition hover:bg-gray-50 has-[:checked]:bg-indigo-50 dark:border-gray-700 dark:hover:bg-gray-900 dark:has-[:checked]:bg-indigo-700/10">
                                <div class="group grid size-4 grid-cols-1 mt-1">
                                    <input
                                        type="checkbox"
                                        class="col-start-1 row-start-1 size-4 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto"
                                        id="Option3" />
                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                        <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>

                                <div>
                                    <strong class="font-medium text-pretty text-gray-900 dark:text-white"> Eric King </strong>

                                    <p class="mt-1 text-sm text-pretty text-gray-700 dark:text-gray-200">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    </p>
                                </div>
                            </label>
                        </div>
                    </fieldset>

                    <fieldset class="space-y-4 custom-radio-checkbox">
                        <div>
                            <label
                                for="DeliveryStandard"
                                class="flex cursor-pointer gap-4 rounded-lg border border-gray-200 bg-white hover:bg-gray-50 p-4 text-sm font-medium shadow-xs has-[:checked]:bg-indigo-50 has-[:checked]:border-indigo-600 has-[:checked]:ring-1 has-[:checked]:ring-indigo-600 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-900 dark:has-[:checked]:bg-indigo-700/10">
                                <input
                                    type="checkbox"
                                    name="DeliveryOption"
                                    value="DeliveryStandard"
                                    id="DeliveryStandard"
                                    class="relative size-5 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden" />
                                <div>
                                    <p class="text-gray-900 dark:text-white">Standard</p>
                                    <!-- <p class="mt-1 text-gray-700 dark:text-gray-200">Free</p> -->
                                </div>

                            </label>
                        </div>

                        <div>
                            <label
                                for="DeliveryPriority"
                                class="flex cursor-pointer gap-4 rounded-lg border border-gray-200 bg-white hover:bg-gray-50 p-4 text-sm font-medium shadow-xs has-[:checked]:bg-indigo-50 has-[:checked]:border-indigo-600 has-[:checked]:ring-1 has-[:checked]:ring-indigo-600 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-900 dark:has-[:checked]:bg-indigo-700/10">
                                <input
                                    type="checkbox"
                                    name="DeliveryOption"
                                    value="DeliveryPriority"
                                    id="DeliveryPriority"
                                    class="relative size-5 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden" />
                                <div>
                                    <p class="text-gray-900 dark:text-white">Next Day</p>
                                    <p class="mt-1 text-gray-700 dark:text-gray-200">£9.99</p>
                                </div>

                            </label>
                        </div>
                        <div>
                            <label
                                for="ThirdOpt"
                                class="flex cursor-pointer gap-4 rounded-lg border border-gray-200 bg-white hover:bg-gray-50 p-4 text-sm font-medium shadow-xs has-[:checked]:bg-indigo-50 has-[:checked]:border-indigo-600 has-[:checked]:ring-1 has-[:checked]:ring-indigo-600 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-900 dark:has-[:checked]:bg-indigo-700/10">
                                <input
                                    type="checkbox"
                                    name="DeliveryOption"
                                    value="ThirdOpt"
                                    id="ThirdOpt"
                                    class="relative size-5 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden" />
                                <div>
                                    <p class="text-gray-900 dark:text-white">Next Day</p>
                                    <p class="mt-1 text-gray-700 dark:text-gray-200">£9.99</p>
                                </div>

                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="mt-5 flex place-content-center lg:place-content-end">
                    <x-primary-button class="ms-3">
                        {{ __('Confirm') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>