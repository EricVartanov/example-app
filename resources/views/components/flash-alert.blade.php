@php
    $alerts = [
        'success' => 'Success',
        'error' => 'Error',
        'note' => 'Note',
    ];
@endphp

@foreach ($alerts as $type => $title)
    @if (session($type))
        <x-alert :type="$type" :title="$title">
            {{ session($type) }}
        </x-alert>
    @endif
@endforeach
