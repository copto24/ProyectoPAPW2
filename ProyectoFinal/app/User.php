<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class user extends Model
{
	use SoftDeletes;
    //
    protected $primaryKey = 'id-user';
    protected $dates = ['deleted_at'];
}
