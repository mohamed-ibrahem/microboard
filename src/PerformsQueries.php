<?php

namespace Microboard;

use Illuminate\Database\Eloquent\Builder;

trait PerformsQueries
{
    /**
     * @return Builder
     */
    protected static function initializeQuery()
    {
        return static::newModel()->newQuery();
    }

    public static function buildIndexQuery($orderings, $search = null, $perPage = null)
    {
        return static::applySearch(
            static::applyOrderings(
                static::initializeQuery(),
                $orderings
            ),
            $search
        )->tap(function ($query) use ($perPage) {
            return static::indexQuery($query->with(static::$with))->paginate($perPage);
        });
    }

    protected static function applySearch($query, $search = null)
    {
        if (! $search) {
            return $query;
        }

        return $query->where(function ($query) use ($search) {
            $model = $query->getModel();

            foreach (static::searchableColumns() as $column) {
                $query->orWhere($model->qualifyColumn($column), 'LIKE', '%' . $search . '%');
            }
        });
    }

    protected static function applyOrderings($query, $orderings)
    {
        $orderings = array_filter($orderings);

        if (empty($orderings)) {
            return empty($query->getQuery()->orders)
                ? $query->latest($query->getModel()->getQualifiedKeyName())
                : $query;
        }

        foreach ($orderings as $column => $direction) {
            $query->orderBy($column, $direction ? 'asc' : 'desc');
        }

        return $query;
    }

    /**
     * Index query builder, you can override from your actual resource.
     *
     * @param Builder $query
     * @return mixed
     */
    public static function indexQuery($query)
    {
        return $query;
    }
}
