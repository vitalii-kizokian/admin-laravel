@php
    $hasError = false;
    if ($name) { $hasError = $errors->has($name); }
@endphp

<div class="@if($disabled) opacity-60 @endif">
    @if ($label || $cornerHint)
        <div class="flex {{ !$label && $cornerHint ? 'justify-end' : 'justify-between' }} mb-1">
            @if ($label)
                <x-label :label="$label" :has-error="$hasError" :id="$id" />
            @endif

            @if ($cornerHint)
                <x-label :label="$cornerHint" :has-error="$hasError" :id="$id" />
            @endif
        </div>
    @endif

    <div class="relative rounded-md @unless($shadowless) shadow-sm @endunless">
        @if ($prefix || $icon)
            <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none
                {{ $hasError ? 'text-red-500' : 'text-gray-400' }}">
                @if ($icon)
                    <x-icon :name="$icon" class="h-5 w-5" />
                @elseif($prefix)
                    <span class="pl-1 flex items-center self-center">
                        {{ $prefix }}
                    </span>
                @endif
            </div>
        @elseif($prepend)
            {{ $prepend }}
        @endif

        <input {{ $attributes->merge([
            'class'        => $getInputClasses($hasError),
            'type'         => 'text',
            'autocomplete' => 'off',
        ]) }} />

        @if ($suffix || $rightIcon || ($hasError && !$append))
            <div class="absolute inset-y-0 right-0 pr-2.5 flex items-center pointer-events-none
                {{ $hasError ? 'text-red-500' : 'text-gray-400' }}">
                @if ($rightIcon)
                    <x-icon :name="$rightIcon" class="h-5 w-5" />
                @elseif($suffix)
                    <span class="pr-1 flex items-center justify-center">
                        {{ $suffix }}
                    </span>
                @elseif($hasError)
                    <x-icon name="exclamation-circle" class="h-5 w-5" />
                @endif
            </div>
        @elseif($append)
            {{ $append }}
        @endif
    </div>

    @if (!$hasError && $hint)
        <label @if($id) for="{{ $id }}" @endif class="mt-2 text-sm text-gray-500">{{ $hint }}</label>
    @endif

    @if ($name)
        <x-error :name="$name" />
    @endif
</div>
