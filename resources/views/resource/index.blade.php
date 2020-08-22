@extends ('microboard::layouts.app')

@section('title', $label)

@section('actions')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            @livewire('index-table', [ 'resource' => $resource ])
        </div>
    </div>
@endsection
