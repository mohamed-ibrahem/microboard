@extends ('microboard::layouts.app')

@section('title', $resource::label())

@section('content')
    @livewire('form', compact('resource', 'resourceId'))
@endsection
