<a {{ $attributes }}
    class="{{ $active ? 'bg-[#E49273] text-white' : 'text-gray-300 hover:bg-[#E49273] hover:text-white' }} rounded-md px-3 py-2 font-extrabold text-[20px]"
    aria-current="page">{{ $slot }}</a>
