@props(['disabled' => false])

<div class="mt-1">
    <textarea @disabled($disabled) {{ $attributes->merge(['class' => 'block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 dark:bg-gray-900 dark:text-gray-300 outline-1 -outline-offset-1 outline-gray-300 dark:outline-gray-700 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6']) }}></textarea>
</div>