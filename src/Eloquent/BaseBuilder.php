<?php

namespace Grimzy\LaravelMysqlSpatial\Eloquent;

use Illuminate\Database\Query\Builder as QueryBuilder;

class BaseBuilder extends QueryBuilder
{
    public function cleanBindings(array $bindings)
    {
        $spatialBindings = [];
        foreach ($bindings as &$binding) {
            if ($binding instanceof SpatialExpression) {
                $spatialBindings[] = $binding->getSpatialValue();
            } else {
                $spatialBindings[] = $binding;
            }
        }

        return parent::cleanBindings($spatialBindings);
    }
}
