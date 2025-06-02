<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <strong>ID:</strong> {{ $category->id }}
                </div>

                <div class="mb-4">
                    <strong>Name:</strong> {{ $category->name }}
                </div>

                <div class="mb-4">
                    <strong>Description:</strong> {{ $category->description }}
                </div>

                <a href="{{ route('categories.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">
                    {{ __('Back to List') }}
                </a>
            </div>

            <!-- Activity Log Section -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Activity Log</h3>

                @if ($category->activities->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400">No activity recorded.</p>
                @else
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($category->activities as $activity)
                            <li class="py-3">
                                <div class="text-sm text-gray-700 dark:text-gray-300">
                                    <strong>{{ ucfirst($activity->description) }}</strong>
                                    @if ($activity->causer)
                                        by <span class="text-blue-500">{{ $activity->causer->name }}</span>
                                    @endif
                                    on <span class="text-gray-500">{{ $activity->created_at->format('M d, Y H:i') }}</span>
                                </div>

                                @if (!empty($activity->changes['attributes']))
                                    <ul class="ml-4 mt-1 text-xs text-gray-600 dark:text-gray-400 list-disc">
                                        @foreach ($activity->changes['attributes'] as $key => $value)
                                            <li>
                                                {{ ucfirst($key) }}: <span class="text-red-500">{{ $activity->changes['old'][$key] ?? 'N/A' }}</span>
                                                → <span class="text-green-500 font-medium">{{ $value }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
