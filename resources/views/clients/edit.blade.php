<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">Edytuj klienta</h2>
                <form action="{{ route('clients.update', $client) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="first_name" class="block text-gray-700 dark:text-gray-300">Imię</label>
                        <input type="text" name="first_name" id="first_name" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100" value="{{ old('first_name', $client->first_name) }}" required>
                        @error('first_name')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="last_name" class="block text-gray-700 dark:text-gray-300">Nazwisko</label>
                        <input type="text" name="last_name" id="last_name" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100" value="{{ old('last_name', $client->last_name) }}" required>
                        @error('last_name')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100" value="{{ old('email', $client->email) }}" required>
                        @error('email')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700 dark:text-gray-300">Telefon</label>
                        <input type="text" name="phone" id="phone" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100" value="{{ old('phone', $client->phone) }}">
                        @error('phone')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 dark:text-gray-300">Adres</label>
                        <input type="text" name="address" id="address" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100" value="{{ old('address', $client->address) }}">
                        @error('address')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('clients.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">Anuluj</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Zapisz zmiany</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 