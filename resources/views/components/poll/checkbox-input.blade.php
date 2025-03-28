@props(['disabled' => false])
@props(['checked' => false])

<label
    for="{{ $attributes->get('id') }}"
    class="flex cursor-pointer items-start gap-4 rounded-lg shadow-xs border border-gray-200 p-4 transition hover:bg-gray-50 has-[:checked]:bg-indigo-50 dark:border-gray-700 dark:hover:bg-gray-900 dark:has-[:checked]:bg-indigo-700/10">
    <div class="group grid size-4 grid-cols-1 mt-1">
        <input
            type="checkbox"
            {{ $attributes->merge(['class' => 'col-start-1 row-start-1 size-4 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto']) }}
            @disabled($disabled) @checked($checked) />
        <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
            <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </div>

    <div>
        {{ $slot }}
    </div>
</label>