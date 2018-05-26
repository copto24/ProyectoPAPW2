<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bloqued extends Model
{
	use SoftDeletes;
    //
    protected $primaryKey = 'id-bloqued';
    protected $dates = ['deleted_at'];
}
