
@foreach (session(LaratoastHelper::getFlashSessionName(), collect())->toArray() as $message)
    @if ($message['modal'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="
            alert
            alert-{{ $message['level'] }}
            {{ $message['important'] ? 'alert-important' : '' }}"
            role="alert"
        >
            @if ($message['important'])
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @endif

            {!! $message['message'] !!}
        </div>
    @endif
@endforeach

{{ session()->forget(LaratoastHelper::getFlashSessionName()) }}
