<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-submit inline-flex items-center px-4 py-2 text-white border-[#35BCA3] bg-[#35BCA3] border-[2px] hover:bg-white hover:text-[#35BCA3] rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
