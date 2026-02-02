@props([
    'type' => 'note',   // success | warning | note
    'title' => null,
])

@php
    $classes = [
        'note' => 'note',
        'success' => 'success',
        'error' => 'error',
    ];
@endphp

<div class="g-alert g-alert-toast {{ $classes[$type] ?? 'note' }}">
    <div>
        @if ($title)
            <p><strong>{{ $title }}</strong></p>
        @endif

        <p>{{ $slot }}</p>
    </div>
</div>


