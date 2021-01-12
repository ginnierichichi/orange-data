@props([
'placeholder' => null,
'trailingAddOn' => null,
])

<div class="flex">
    <select {{ $attributes->merge(['class' => 'form-select block w-full pl-3 pr-10 py-2 bg-dark-grey-600 text-base leading-6 border-media-orange focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5' . ($trailingAddOn ? ' rounded-r-none' : '')]) }}>
        @if ($placeholder)
            <option disabled value="">{{ $placeholder }}</option>
        @endif

        {{ $slot }}
    </select>

    @if ($trailingAddOn)
        {{ $trailingAddOn }}
    @endif
</div>

