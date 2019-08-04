<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BaseSystem extends Model
{
    public function defaultWhere()
    {
        return array('IsDelete' => 0, 'IsInactive' => 0);
    }

    public function sqlQuery($table, $where)
    {
        return $result = DB::table($table)->where($where)->get();
    }

    public function sqlQueryOneRow($table, $where)
    {
        return $result = DB::table($table)->where($where)->first();
    }

    public function sqlQueryOneRowOrderBy($table, $orderby)
    {
        return $result = DB::table($table)->orderby($orderby)->first();
    }

    public function sqlQueryWithPagination($table, $where, $pagination)
    {
        return $result = DB::table($table)->where($where)-get();//->simplePaginate($pagination);
    }

    public function sqlQuerySomeFields($table, $where, $fields, $onerows = false)
    {
        if ($onerows) {
            return DB::table($table)->select($fields)->where($where)->first();
        }else {
            return DB::table($table)->select($fields)->where($where)->get();
        }   
    }
}
