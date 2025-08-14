@props([
    'type' => 'info',
    'message' => 'A simple alert with an example link.',
    'dismissible' => true,
    'id' => 'alert-'.uniqid(),
])

@php
    $baseClasses = 'flex items-center p-4 mb-4 rounded-lg';
    $iconClasses = 'shrink-0 w-4 h-4';
    $closeButtonClasses = 'ms-auto -mx-1.5 -my-1.5 p-1.5 inline-flex items-center justify-center h-8 w-8 rounded-lg';
    
    $variants = [
        'info' => [
            'bg' => 'bg-blue-50 dark:bg-gray-800',
            'text' => 'text-blue-800 dark:text-blue-400',
            'close' => 'bg-blue-50 text-blue-500 hover:bg-blue-200 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700',
            'ring' => 'focus:ring-blue-400',
            'icon' => 'M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z'
        ],
        'success' => [
            'bg' => 'bg-green-50 dark:bg-gray-800',
            'text' => 'text-green-800 dark:text-green-400',
            'close' => 'bg-green-50 text-green-500 hover:bg-green-200 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700',
            'ring' => 'focus:ring-green-400',
            'icon' => 'M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z'
        ],
        'warning' => [
            'bg' => 'bg-yellow-50 dark:bg-gray-800',
            'text' => 'text-yellow-800 dark:text-yellow-300',
            'close' => 'bg-yellow-50 text-yellow-500 hover:bg-yellow-200 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700',
            'ring' => 'focus:ring-yellow-400',
            'icon' => 'M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z'
        ],
        'error' => [
            'bg' => 'bg-red-50 dark:bg-gray-800',
            'text' => 'text-red-800 dark:text-red-400',
            'close' => 'bg-red-50 text-red-500 hover:bg-red-200 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700',
            'ring' => 'focus:ring-red-400',
            'icon' => 'M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z'
        ],
        'dark' => [
            'bg' => 'bg-gray-50 dark:bg-gray-800',
            'text' => 'text-gray-800 dark:text-gray-300',
            'close' => 'bg-gray-50 text-gray-500 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700',
            'ring' => 'focus:ring-gray-400',
            'icon' => 'M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z'
        ]
    ];
    
    $variant = $variants[$type] ?? $variants['info'];
    $classes = "$baseClasses {$variant['bg']} {$variant['text']}";
    $closeClasses = "$closeButtonClasses {$variant['close']} {$variant['ring']} focus:ring-2";
@endphp

<div id="{{ $id }}" class="{{ $classes }}" role="alert">
    <svg class="{{ $iconClasses }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="{{ $variant['icon'] }}"/>
    </svg>
    <span class="sr-only">{{ ucfirst($type) }}</span>
    <div class="ms-3 text-sm font-medium">
        {{ $slot }}
    </div>
    @if($dismissible)
    <button type="button" class="{{ $closeClasses }}" data-dismiss-target="#{{ $id }}" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
    @endif
</div>
