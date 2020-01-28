<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoricalChange extends Model
{
    //
    protected $fillable = [
    	'new_values',
		'old_values',
		'user_id'
    ];

    public function changeable(){
    	return $this->morphTo();
    }
}
