@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-danger']) }}>
        @foreach ((array) $messages as $message)
            <li class="text-danger"><small>{{ $message }}</small></li>
        @endforeach
    </ul>
@endif
