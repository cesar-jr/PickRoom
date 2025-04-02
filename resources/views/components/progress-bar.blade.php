@props([
'percentage' => 50,
'with_text' => true,
])
<div class="bg-indigo-200 rounded-full dark:bg-gray-700">
    <div class="bg-indigo-600 rounded-full dark:bg-indigo-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none min-h-4" style="width: {{$percentage}}%">
        @if($with_text)
        {{ $percentage }}%
        @endif
    </div>
</div>