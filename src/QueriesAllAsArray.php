<?php

namespace mtgsdk;

trait QueriesAllAsArray
{
    /**
     * @return array
     */
    public static function all()
    {
        return (new QueryBuilder(static::class))->array();
    }
}
