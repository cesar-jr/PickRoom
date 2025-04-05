@props(['type'=>'info'])

@pushOnce('scripts')
@vite(["resources/js/components/toast.js"])
@endPushOnce

<div class="toast hidden fixed bottom-5 right-5 items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
    @switch($type)
    @case('success')
    <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <x-icons.circle-check />
        <span class="sr-only">Check icon</span>
    </div>
    @break
    @case('error')
    <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
        <x-icons.circle-x />
        <span class="sr-only">Error icon</span>
    </div>
    @break
    @case('warning')
    <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
        <x-icons.circle-exclamation />
        <span class="sr-only">Warning icon</span>
    </div>
    @break
    @default
    <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-700 dark:text-blue-200">
        <x-icons.circle-exclamation />
        <span class="sr-only">Warning icon</span>
    </div>
    @endswitch
    <div class="ms-3 text-sm font-normal">{{ $slot }}</div>
    <button type="button" class="close-toast-btn ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
        <span class="sr-only">Close</span>
        <x-icons.x />
    </button>
</div>