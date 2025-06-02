<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Unit Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <strong>ID:</strong> {{ $unit->id }}
                </div>

                <div class="mb-4">
                    <strong>User:</strong> {{ $unit->name }}
                </div>
                <div class="mb-4">
                    <strong>Description:</strong> {{ $unit->description }}
                </div>
                <div class="mb-4">
                    <strong>Short Code:</strong> {{ $unit->short_code }}
                </div>
                <a href="{{ route('units.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">
                    {{ __('Back to List') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
