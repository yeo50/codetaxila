<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#7A3DED]  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#4C1D95] focus:bg-[#4C1D95] active:bg-[#4C1D95] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
