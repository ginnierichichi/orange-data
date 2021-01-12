@props([
    'label',
    'for',
    'error' => false,
    'helpText' =>false,
    'inline'=> false,
])
@if($inline)
    <div>
        <label for="{{ $for }}" class="block text-sm font-medium leading-5 text-white">{{ $label }}</label>

        <div class="mt-1 relative rounded-md shadow-sm">
            {{ $slot }}

            @if ($error)
                <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>
            @endif

            @if ($helpText)
                <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
            @endif
        </div>
    </div>
@else
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start">
        <label for="username" class="block text-sm font-futura leading-5 text-white sm:mt-px sm:pt-2">
            {{$label}}
        </label>

        <div class="mt-1 sm:mt-0 sm:col-span-2">
            {{ $slot }}
            @if($error)
                <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>
            @endif

            @if($helpText)
                <p class="mt-2 text-sm text-gray-500">{{$helpText}}</p>
            @endif
        </div>
    </div>
@endif
