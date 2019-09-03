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

    public function sqlQueryWithPagination($table, $where, $OrderBy, $pagination, $IsSearch = false, $textSearch = "")
    {
        if (!$IsSearch) {
            return $result = DB::table($table)->where($where)->orderBy($OrderBy, 'desc')->paginate($pagination);
        }else {
            return $result = DB::table($table)->where($where)->where('GoodsBarcode','like','%'.$textSearch.'%')->orWhere('GoodsName','like','%'.$textSearch.'%')->orderBy($OrderBy, 'desc')->paginate($pagination);
        }
    }

    public function sqlQuerySomeFields($table, $where, $fields, $onerows = false, $OrderBy = 'CreatedDate')
    {
        if ($onerows) {
            return DB::table($table)->select($fields)->where($where)->OrderBy($OrderBy, 'desc')->first();
        }else {
            return DB::table($table)->select($fields)->where($where)->OrderBy($OrderBy, 'desc')->get();
        }   
    }

    public function sqlCount($table, $where, $fields)
    {
        return DB::table($table)->select($fields)->where($where)->count();
    }
}
