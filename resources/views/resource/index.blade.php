<x-microboard-app :title="$label">
    <div class="row">
        <div class="col-12">
            @livewire('index-table', [
                'resource' => $resource
            ])
        </div>
    </div>
</x-microboard-app>
