<?php

namespace Microboard;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Microboard\Fields\ID;

trait ResolveFields
{
    /**
     * @param Request $request
     * @return array
     */
    public function indexFields(Request $request)
    {
        $fields = $this->availableFields('index', $request)
            ->each->resolveForDisplay($this->resource);

        return [
            'resource' => $this->resource,
            'id' => $fields->whereInstanceOf(ID::class)->first() ?? ID::forModel($this->resource),
            'fields' => $fields->all()
        ];
    }

    /**
     * @param string $method
     * @param Request $request
     * @return Collection
     */
    protected function availableFields($method, Request $request)
    {
        $method = $this->fieldsMethod($method);

        return collect($this->fields($request))
            ->filter->$method($request, $this->resource);
    }

    /**
     * Compute the method to use to get the available fields.
     *
     * @param string $method
     * @return string
     */
    protected function fieldsMethod($method)
    {
        return sprintf('isShownOn%s', ucfirst($method));
    }
}
