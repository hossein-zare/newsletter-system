@props([
    'message',
    'closable' => false,
    'type',
])

@php
    switch ($type) {
        case 'success':
            $bgColor = 'bg-green-400';
            $textColor = 'text-white';
        break;

        case 'error':
            $bgColor = 'bg-red-500';
            $textColor = 'text-white';
        break;
    }

    $id = 'alert-'. rand(1000000, 9999999);
@endphp

<div class="{{ $bgColor }} {{ $textColor }} border-0 rounded-xl mb-3" id="{{ $id }}">
    <div @class([
        'flex items-center justify-between py-3 px-3',
        'md:ps-5' => $closable,
    ])>
        {{ $message }}

        @if ($closable)
            <button class="bg-black/20 hover:bg-black/30 flex items-center justify-center rounded-full w-6 h-6 leading-none cursor-pointer ms-5" onclick="document.getElementById('{{ $id }}').remove()">×</button>
        @endif
    </div>
</div>
