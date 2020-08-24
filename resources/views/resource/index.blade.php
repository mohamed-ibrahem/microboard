@extends ('microboard::layouts.app')

@section('title', $resource::label())

@section('content')
    <div class="row">
        <div class="col-12">
            @livewire('datatable', compact('resource'))
        </div>
    </div>
@endsection
