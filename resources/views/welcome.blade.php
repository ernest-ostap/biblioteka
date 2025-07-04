<x-guest-layout>
    <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg text-center">
        <h1 class="text-3xl font-extrabold mb-4 text-gray-900 dark:text-gray-100 tracking-tight">Witaj w panelu biblioteki</h1>
        <p class="mb-8 text-gray-600 dark:text-gray-300 text-lg">Zaloguj się, aby kontynuować korzystanie z systemu.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
            <a href="{{ route('login') }}" class="inline-block bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 text-white font-bold py-3 px-8 rounded-lg text-lg shadow transition duration-200">Zaloguj się</a>
            <a href="{{ route('register') }}" class="inline-block bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 text-white font-bold py-3 px-8 rounded-lg text-lg shadow transition duration-200">Zarejestruj się</a>
        </div>
    </div>
</x-guest-layout>
