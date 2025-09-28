@props(['value'])

<label {{ $attributes->merge(['class' => 'text-white font-bold']) }}>
    {{ $value ?? $slot }}
</label>
