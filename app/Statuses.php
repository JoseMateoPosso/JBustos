<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statuses extends Model
{
    //
    protected $fillable = [
    	'description',
		'type'
    ];
}
