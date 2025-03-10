@props(['disabled' => false])

<div>
    <label
        for="{{ $attributes->get('id') }}"
        class="flex items-center cursor-pointer gap-4 rounded-lg border border-gray-200 bg-white hover:bg-gray-50 p-4 text-sm font-medium shadow-xs has-[:checked]:bg-indigo-50 has-[:checked]:border-indigo-600 has-[:checked]:ring-1 has-[:checked]:ring-indigo-600 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-900 dark:has-[:checked]:bg-indigo-700/10">
        <input
            type="radio"
            {{ $attributes->merge(['class' => 'relative size-5 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden']) }}
            @disabled($disabled) />
        <div>
            <p class="mt-1 text-gray-900 dark:text-white">{{ $slot }}</p>
        </div>
    </label>
</div>