@isset($type)
    @if ($type === 'forms') {!! $slot !!}
    @elseif ($type === 'text') {!! $text !!}
    @endif
@else {!! $text !!}
@endisset
