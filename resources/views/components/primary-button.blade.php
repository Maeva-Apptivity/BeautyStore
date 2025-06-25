{{-- Design du bouton ajustée avec la charte graphique --}}
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-purple-700 dark:bg-purple-700 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-purple-900 dark:hover:bg-purple-900 focus:bg-purple-950 dark:focus:bg-purple-950 active:bg-purple-500 dark:active:bg-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2 dark:focus:ring-offset-purple-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
