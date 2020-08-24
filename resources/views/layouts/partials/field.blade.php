@php
    /** @var \Illuminate\Support\ViewErrorBag $errors */
    /** @var string $name */
    /** @var string $title */

    $hasLabel = isset($title);
    $groupClasses = 'form-group' .
        ($errors->has($name) ? ' has-danger' : '') .
        ($hasLabel ? ' form-row' : '');
@endphp

<div class="{{ $groupClasses }}">
    @if($hasLabel)
        <label for="{{ $name }}" class="control-label col-sm-3">{!! $title !!}</label>
    @endif

    <div class="{{ $hasLabel ? 'col-sm-9' : '' }}">
        {!! $slot !!}
        @error($name) <span role="alert" class="mt-1 d-block invalid-feedback w-auto">{{ str_replace(['fields.', '.value'], '', $message) }}</span> @enderror
    </div>
</div>
