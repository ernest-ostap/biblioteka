<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Szczegóły autora') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('authors.edit', $author) }}" 
                   class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edytuj
                </a>
                <a href="{{ route('authors.index') }}" 
                   class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Powrót
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <div class="flex-shrink-0 h-16 w-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                            <span class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                                {{ strtoupper(substr($author->first_name, 0, 1) . substr($author->last_name, 0, 1)) }}
                            </span>
                        </div>
                        <div class="ml-6">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                {{ $author->first_name }} {{ $author->last_name }}
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                ID: #{{ $author->id }} • Dodano {{ $author->created_at->format('d.m.Y H:i') }}
                            </p>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                                    Imię
                                </h4>
                                <p class="mt-1 text-lg text-gray-900 dark:text-gray-100">
                                    {{ $author->first_name }}
                                </p>
                            </div>

                            <div>
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                                    Nazwisko
                                </h4>
                                <p class="mt-1 text-lg text-gray-900 dark:text-gray-100">
                                    {{ $author->last_name }}
                                </p>
                            </div>

                            <div>
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                                    Pełne imię
                                </h4>
                                <p class="mt-1 text-lg text-gray-900 dark:text-gray-100">
                                    {{ $author->first_name }} {{ $author->last_name }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-3">
                                Biografia
                            </h4>
                            @if($author->bio)
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                    <p class="text-gray-900 dark:text-gray-100 whitespace-pre-line leading-relaxed">
                                        {{ $author->bio }}
                                    </p>
                                </div>
                            @else
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                    <p class="text-gray-500 dark:text-gray-400 italic">
                                        Brak informacji o biografii autora.
                                    </p>
                                </div>
                            @endif
                        </div>

                        <div class="mt-8 flex justify-between items-center">
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                Ostatnia aktualizacja: {{ $author->updated_at->format('d.m.Y H:i') }}
                            </div>
                            <div class="flex space-x-2">
                                <form action="{{ route('authors.destroy', $author) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200 flex items-center"
                                            onclick="return confirm('Czy na pewno chcesz usunąć tego autora?')">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Usuń autora
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
