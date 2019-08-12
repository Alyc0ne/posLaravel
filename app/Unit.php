<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'smUnit';
    protected $primaryKey = 'UnitID';
    const CREATED_AT = 'CreatedDate';
    const UPDATED_AT = 'ModifiedDate';
}
