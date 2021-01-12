@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-8 py-4 bg-dark-grey-600">
        <div class="text-xl pb-8 pt-4 text-center">
            {{ $title }}
        </div>

        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-media-orange bg-opacity-75 text-right">
        {{ $footer }}
    </div>
</x-modal>

