<x-app-layout>
    <div class="max-w-3xl mx-auto px-6 py-12 text-center">
        <h1 class="text-4xl font-bold text-indigo-600 dark:text-indigo-400 mb-4">🗳️ Welcome to PollPlay!</h1>
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-8">
            Got opinions? Cast your vote or create your own poll and see what the crowd thinks!
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4 mb-12">
            <a href="{{ route('polls.index') }}" class="inline-block bg-indigo-600 text-white text-lg font-semibold px-6 py-3 rounded-xl shadow hover:bg-indigo-500 transition">
                View Polls
            </a>
            <a href="{{ route('polls.create') }}" class="inline-block bg-white dark:bg-gray-800 text-indigo-600 dark:text-indigo-400 border border-indigo-600 dark:border-indigo-400 text-lg font-semibold px-6 py-3 rounded-xl hover:bg-indigo-50 dark:hover:bg-gray-700 transition">
                Create a Poll
            </a>
        </div>

        <div class="text-left bg-gray-50 dark:bg-gray-800 p-6 rounded-xl shadow">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">✨ How It Works</h2>
            <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                <li>✅ Browse polls and cast your vote in seconds</li>
                <li>✅ Instantly see results</li>
                <li>✅ Got a burning question? Create your own poll!</li>
                <li>✅ Share your polls with friends and watch the results roll in</li>
            </ul>
        </div>
    </div>
</x-app-layout>