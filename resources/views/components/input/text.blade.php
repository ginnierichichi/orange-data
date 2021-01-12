@props(['leadingAddOn' => false])

<div class="max-w-lg flex rounded-md w-full shadow-sm">
    @if($leadingAddOn)
    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-media-orange bg-gray-50 text-white sm:text-sm">
        {{$leadingAddOn}}
    </span>
    @endif
    <input
        {{$attributes}}
        class="{{ $leadingAddOn ? 'rounded-none rounded-r-md' : '' }}flex-1 border-media-orange form-input block w-full text-white bg-dark-grey-600 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
</div>

