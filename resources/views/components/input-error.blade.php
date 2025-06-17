@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1 mt-1']) }}>
        @foreach ((array) $messages as $message)
            @if (is_string($message))
                <li>{{ $message }}</li>
            @else
                @foreach ($message as $_)
                    <li>{{ $_ }}</li>
                @endforeach
            @endif
        @endforeach
    </ul>
@endif
