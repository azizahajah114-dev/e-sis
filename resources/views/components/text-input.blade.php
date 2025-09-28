@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'block w-full py-2 border-b-2 border-gray-300 focus:border-[#1E90FF] focus:outline-none transition duration-200 placeholder-gray-400 opacity-40 rounded-[25px]']) }}>
