<div class="row" wire:init="load">
    <div class="col">
        <form wire:submit.prevent="submit">
            @csrf

            <div class="card">
                <div class="card-body">
                    @foreach($fields as $field)
                        @componentfirst([$field['component'], 'microboard::fields.default'], [
                            'type' => 'forms',
                            'field' => $field
                        ])@endcomponentfirst
                    @endforeach
                </div>

                <div class="card-footer text-right">
                    <button class="btn btn-primary position-relative"
                            wire:target="submit"
                            wire:loading.attr="disabled" wire:loading.class="pl-5">
                        <span class="position-absolute left-3 h-100" wire:loading wire:target="submit">
                            <span class="fa fa-spinner fa-spin" role="status">
                                <span class="sr-only">Loading...</span>
                            </span>
                        </span>

                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
