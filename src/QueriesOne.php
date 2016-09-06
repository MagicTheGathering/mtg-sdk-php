<?php

namespace mtgsdk;

trait QueriesOne
{
    /**
     * @param string $id
     *
     * @return static|null
     */
    public static function find($id)
    {
        return (new QueryBuilder(static::class))->find($id);
    }
}
