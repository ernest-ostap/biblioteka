<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">Szczegóły klienta</h2>
                <div class="mb-4">
                    <span class="font-semibold text-gray-700 dark:text-gray-300">Imię:</span> {{ $client->first_name }}
                </div>
                <div class="mb-4">
                    <span class="font-semibold text-gray-700 dark:text-gray-300">Nazwisko:</span> {{ $client->last_name }}
                </div>
                <div class="mb-4">
                    <span class="font-semibold text-gray-700 dark:text-gray-300">Email:</span> {{ $client->email }}
                </div>
                <div class="mb-4">
                    <span class="font-semibold text-gray-700 dark:text-gray-300">Telefon:</span> {{ $client->phone ?? '-' }}
                </div>
                <div class="mb-4">
                    <span class="font-semibold text-gray-700 dark:text-gray-300">Adres:</span> {{ $client->address ?? '-' }}
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('clients.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Powrót</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 