@props(['messages'])

@if ($messages)
        @foreach ((array) $messages as $message)
            <div class="alert alert-warning" role="alert">
                {{ $message }}
            </div>
        @endforeach
    </ul>
@endif
