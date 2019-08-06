<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'smGoods';
    protected $primaryKey = 'GoodsID';
    const CREATED_AT = 'CreatedDate';
    const UPDATED_AT = 'ModifiedDate';
    
}
