<?php

namespace mtgsdk;

trait QueriesAll
{
    /**
     * @return array
     */
    public static function all()
    {
        return (new QueryBuilder(static::class))->all();
    }
}
