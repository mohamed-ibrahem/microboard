@component('microboard::fields.container', [
    'type' => $type ?? 'text',
    'text' => $field['value']
])
    <input type="text" wire:model.lazy="{{ $field['key'] }}" class="form-control">
@endcomponent
