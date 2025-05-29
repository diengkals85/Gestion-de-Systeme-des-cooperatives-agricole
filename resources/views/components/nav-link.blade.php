@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 dark:border-indigo-600 text-sm font-medium leading-5 text-#020535-900 dark:text-#020535-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-#020535-500 dark:text-#020535-400 hover:text-#020535-700 dark:hover:text-#020535-300 hover:border-#020535-300 dark:hover:border-#020535-700 focus:outline-none focus:text-#020535-700 dark:focus:text-#020535-300 focus:border-#020535-300 dark:focus:border-#020535-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
