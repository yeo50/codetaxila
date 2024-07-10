<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex mt-2 mx-2 items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase
                                tracking-widest
                            bg-red-500 hover:bg-red-700 focus:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2
                            transition ease-in-out duration-150',
    ]) }}>
    {{ $slot }}

</button>
