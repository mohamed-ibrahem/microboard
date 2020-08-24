<div class="card" wire:init="load">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <button class="btn btn-danger btn-sm" type="button">
                    <span class="fa fa-trash mr-1"></span> (5)
                </button>
            </div>
            <div class="col-sm-6">
                <div class="d-flex justify-content-end">
                    <div class="dropdown">
                        <button class="btn btn-light btn-sm"
                                type="button"
                                id="table-filters-dropdown"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                        >
                            <span class="fa fa-filter"></span>
                        </button>

                        <div class="dropdown-menu py-0 mt-2 mx-2 overflow-hidden"
                             aria-labelledby="table-filters-dropdown">
                            <form>
                                <div class="form-group px-3 mb-2">
                                    <label for="" class="bg-lighter d-block px-4 py-2 mx--3">Per page</label>
                                    <select class="custom-select custom-select-sm" wire:model="perPage">
                                        @foreach($perPageOptions as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="form-group mb-0 flex-grow-1 flex-sm-grow-0">
                        <div class="input-group input-group-sm input-group-merge">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-search" wire:loading.remove></i>
                                <i class="fa fa-spin fa-spinner" wire:loading></i>
                            </span>
                            </div>
                            <input wire:model="search" class="form-control" placeholder="Your name" type="search">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($resources && $resources->count())
        <div class="table-responsive">
            <table class="table table-hover table align-items-center table-flush">
                <thead class="thead-light">
                <tr>
                    <th style="width: 1%">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input"
                                   id="select_all_resources">
                            <label class="custom-control-label" for="select_all_resources"></label>
                        </div>
                    </th>

                    @foreach($resources->first()['fields'] as $field)
                        <th style="width: {{ $field->meta['width'] ?? '15%' }}">
                            @if ($field->sortable)
                                <a href="javascript:;" wire:click.prevent="sortBy('{{ $field->attribute }}')">
                                    {{ $field->name }}

                                    @if ($sortField !== $field->attribute)
                                        <i class="text-muted fas fa-sort"></i>
                                    @elseif ($ascSorting)
                                        <i class="text-primary fas fa-sort-up"></i>
                                    @else
                                        <i class="text-primary fas fa-sort-down"></i>
                                    @endif
                                </a>
                            @else
                                {{ $field->name }}
                            @endif
                        </th>
                    @endforeach

                    <th style="width: 10%;"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($resources as $resource)
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"
                                       name="selected[]"
                                       value="{{ $resource['id']->value }}"
                                       class="custom-control-input"
                                       id="resource_{{ $resource['id']->value }}">
                                <label class="custom-control-label" for="resource_{{ $resource['id']->value }}"></label>
                            </div>
                        </td>
                        @foreach($resource['fields'] as $field)
                            <td>
                                @includeFirst([$field->component(), 'microboard::fields.default'])
                            </td>
                        @endforeach

                        <td class="text-right">
                            <a href="javascript:;"
                               wire:click.prevent="gotTo('show', {{ $resource['id']->value }})"
                               class="btn btn-sm btn-primary mx-0"
                            >
                                <span class="fa fa-eye"></span>
                            </a>
                            <a href="javascript:;"
                               wire:click.prevent="gotTo('edit', {{ $resource['id']->value }})"
                               class="btn btn-sm btn-warning mx-0"
                            >
                                <span class="fa fa-edit"></span>
                            </a>

                            <a href="" class="btn btn-sm btn-danger mx-0">
                                <span class="fa fa-trash"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {!! $resources->links() !!}
        </div>
    @elseif($readyToLoad)
        <div class="card-body">
            <div class="text-center h3 text-muted">
                <div class="py-7 w-25 mx-auto mb-4 bg-gradient-warning"></div>
                <strong>No data</strong> add new Data from here.
            </div>
        </div>
    @endif
</div>
