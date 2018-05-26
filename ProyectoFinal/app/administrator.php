<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class administrator extends Model
{
	use SoftDeletes;
    //
    protected $primaryKey = 'id-administrator';
    protected $dates = ['deleted_at'];
}
