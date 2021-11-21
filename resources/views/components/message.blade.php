@props([
    'reset' => true,
])

@foreach (session(LaratoastHelper::getFlashSessionName(), collect())->toArray() as $message)
    @if ($message['modal'])
        @include('laramodal::components.modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="alert
                    alert-{{ $message['type'] }}
        {{ $message['important'] ? 'alert-important' : '' }}"
             role="alert"
        >

            @if ($message['important'])
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>
            @endif

            {!! $message['message'] !!}
        </div>
    @endif
@endforeach

@if($reset)
    @php
        LaratoastHelper::resetFlashes();
    @endphp
@endif
