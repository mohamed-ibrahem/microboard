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
            'id' => $fields->whereInstanceOf(ID::class)->first()->toArray() ?? ID::forModel($this->resource)->toArray(),
            'fields' => $fields->map->toArray()->all()
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function updateFields(Request $request)
    {
        return $this->availableFields('update', $request)
            ->each->resolveForDisplay($this->resource)
            ->reject(function ($field) use ($request) {
                return $field instanceof ID && $field->attribute === $this->resource->getKeyName();
            })
            ->keyBy('attribute')
            ->map->toArray()
            ->all();
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
