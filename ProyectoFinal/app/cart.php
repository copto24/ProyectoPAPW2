<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cart extends Model
{
	use SoftDeletes;
    //
    protected $primaryKey = 'id-cart';
    protected $dates = ['deleted_at'];
}
