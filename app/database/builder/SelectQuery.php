<?php

namespace app\database\builder;

class SelectQuery
{
    protected $queryType = 'SELECT';
    protected $columns = ['*'];
    protected $table = null;
    protected $joins = [];
    protected $where = [];
    protected $groupBy = null;
    protected $orderBy = null;
    protected $limit = null;
    protected $offset = null;
    protected $distinct = false;

    public static function table($table)
    {
        return new static($table);
    }
}
