<?php

namespace Microboard;

use Illuminate\Database\Eloquent\Builder;

trait PerformsQueries
{
    /**
     * Initialize the query builder.
     *
     * @return Builder
     */
    protected static function initializeQuery()
    {
        return static::newModel()->newQuery();
    }

    /**
     * Build index query with orderings, search and per page option.
     *
     * @param array $orderings
     * @param string|null $search
     * @param int|null $perPage
     * @return mixed
     */
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

    /**
     * Apply the search query to the query.
     *
     * @param Builder $query
     * @param string $search
     * @return Builder
     */
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

    /**
     * Apply any applicable orderings to the query.
     *
     * @param Builder $query
     * @param array $orderings
     * @return Builder
     */
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
     * @return Builder
     */
    public static function indexQuery($query)
    {
        return $query;
    }
}
