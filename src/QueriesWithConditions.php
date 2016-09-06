<?php

namespace mtgsdk;

trait QueriesWithConditions
{
    /**
     * @param array $arguments
     *
     * @return QueryBuilder
     */
    public static function where(array $arguments)
    {
        return (new QueryBuilder(static::class))->where($arguments);
    }
}
