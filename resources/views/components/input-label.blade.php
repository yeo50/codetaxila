@props(['value'])

<label {{ $attributes->merge(['class' => 'inline-block font-medium text-sm text-gray-700 w-[100px] me-3 ']) }}>
    {{ $value ?? $slot }}
</label>
