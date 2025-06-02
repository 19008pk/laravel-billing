<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Units') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 space-y-6">

                <!-- Per‑Page Selector & Add Button -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <form method="GET" class="flex items-center space-x-2">
                        <label for="perpage" class="text-gray-700 dark:text-gray-300">{{ __('Show') }}</label>
                        <select id="perpage" name="perpage" onchange="this.form.submit()"
                            class="block w-20 rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 shadow-sm focus:ring focus:ring-indigo-200">
                            @foreach ([5, 10, 25, 50, 100] as $size)
                                <option value="{{ $size }}" {{ $perPage === $size ? 'selected' : '' }}>
                                    {{ $size }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-gray-700 dark:text-gray-300">{{ __('entries') }}</span>
                    </form>

                    <div class="flex items-center space-x-4">
                        @if (session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-2 rounded">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-2 rounded">
                                {{ session('error') }}
                            </div>
                        @endif
                        <a href="{{ route('units.create') }}"
                            class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded shadow">
                            {{ __('Add New URL') }}
                        </a>
                    </div>
                </div>

                <!-- Responsive Table Wrapper -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    ID
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Name
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Description
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Short Code
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($units as $unit)
                                <tr
                                    class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $unit->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $unit->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $unit->description }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-normal text-sm text-gray-700 dark:text-gray-200">
                                        {{ $unit->short_code }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                        <a href="{{ route('units.show', $unit) }}"
                                            class="inline-block text-indigo-600 hover:text-indigo-800 mx-1">View
                                        </a>
                                        <a href="{{ route('units.edit', $unit) }}"
                                            class="inline-block text-yellow-600 hover:text-yellow-800 mx-1">Edit
                                        </a>
                                        <form action="{{ route('units.destroy', $unit) }}" method="POST"
                                            class="inline-block mx-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800"
                                                onclick="return confirm('{{ __('Are you sure?') }}')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $units->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
