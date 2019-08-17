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

    public function defaultOrderBy()
    {
        return array('CreatedDate' => 'desc');
    }

    public function sqlQuery($table, $where)
    {
        return $result = DB::table($table)->where($where)->get();
    }

    public function sqlQueryOrderBy($table, $where, $OrderBy)
    {
        return $result = DB::table($table)->where($where)->orderBy($OrderBy, 'desc')->get();
    }

    public function sqlQueryOneRow($table, $where)
    {
        return $result = DB::table($table)->where($where)->first();
    }

    public function sqlQueryOneRowDesc($table, $OrderBy)
    {
        return $result = DB::table($table)->orderBy($OrderBy, 'desc')->first();
    }

    public function sqlQuerySomeFieldsOneRowDesc($table, $fields, $OrderBy)
    {
        return $result = DB::table($table)->select($fields)->orderBy($OrderBy, 'desc')->first();
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
