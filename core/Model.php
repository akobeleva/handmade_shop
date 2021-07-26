<?php

namespace core;

use database\QueryBuilder;

abstract class Model
{
    protected static $table;

    public static function getAll(): array
    {
        $queryBuilder = new QueryBuilder();
        $rows = $queryBuilder->select()->from(static::$table)->execute();
        return static::rowsToEntities($rows);
    }

    public static function getById($id): Model
    {
        $queryBuilder = new QueryBuilder();
        $rows = $queryBuilder->select()->from(static::$table)->where('id', $id)
            ->execute();
        return static::rowToEntity($rows[0]);
    }

    protected static function rowsToEntities($rows): array
    {
    }

    protected static function rowToEntity($row): Model
    {
    }
}