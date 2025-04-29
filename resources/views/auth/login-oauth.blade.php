<x-guest-layout>
    <div class="space-y-4 mt-6">
        {{-- Google Login --}}
        <a href="{{ route('oauth.redirect', ['provider' => 'google']) }}"
            class="w-full flex items-center justify-center px-4 py-2 border rounded-lg shadow-sm bg-white text-gray-700 dark:bg-gray-800 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-700 transition">
            <img src="{{ asset('svg/google.svg') }}" alt="Google" class="w-5 h-5 mr-2">
            <span class="font-medium">{{ __("Login with Google") }}</span>
        </a>

        {{-- X Login --}}
        <a href="{{ route('oauth.redirect', ['provider' => 'x']) }}"
            class="w-full flex items-center justify-center px-4 py-2 border rounded-lg shadow-sm bg-white text-gray-700 dark:bg-gray-800 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-700 transition">
            <img src="{{ asset('svg/X.svg') }}" alt="X" class="w-5 h-5 mr-2">
            <span class="font-medium">{{ __("Login with X") }}</span>
        </a>

        {{-- GitHub Login --}}
        <a href="{{ route('oauth.redirect', ['provider' => 'github']) }}"
            class="w-full flex items-center justify-center px-4 py-2 border rounded-lg shadow-sm bg-white text-gray-700 dark:bg-gray-800 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-700 transition">
            <img src="{{ asset('svg/github.svg') }}" alt="GitHub" class="w-5 h-5 mr-2">
            <span class="font-medium">{{ __("Login with GitHub") }}</span>
        </a>
    </div>
</x-guest-layout>