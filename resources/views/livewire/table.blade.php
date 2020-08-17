<div class="card">
    <div class="card-header">
        <div class="row justify-content-end">
            <div class="col-md-6">
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

                        <div class="dropdown-menu py-0 mt-2 mx-2 overflow-hidden" aria-labelledby="table-filters-dropdown">
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

                    <div class="form-group mb-0">
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
                    @foreach($resources->first()['fields'] as $field)
                        <th>
                            <a href="#" role="button" wire:click.prevent="sortBy('{{ $field->attribute }}')">
                                {{ $field->name }}

                                @if ($sortField !== $field->attribute)
                                    <i class="text-muted fas fa-sort"></i>
                                @elseif ($ascSorting)
                                    <i class="fas fa-sort-up"></i>
                                @else
                                    <i class="fas fa-sort-down"></i>
                                @endif
                            </a>
                        </th>
                    @endforeach
                    <th style="width: 10%;"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($resources as $resource)
                    <tr>
                        @foreach($resource['fields'] as $field)
                            <td>{{ $field->value }}</td>
                        @endforeach
                        <td>
                            options...
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {!! $resources->links('microboard::partials.pagination-links') !!}
        </div>
    @endif
</div>
