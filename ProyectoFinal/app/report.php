<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class report extends Model
{
	use SoftDeletes;
    //
    protected $primaryKey = 'id-report';
     protected $dates = ['deleted_at'];
}
