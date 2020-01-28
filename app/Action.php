<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    //protected $table = 'dctomodelo';
    protected $fillable =[
    	'description',
		'path',
		'status_id'
    ];

    public function status()
    {
        return $this->belongsTo(Statuses::class, 'status_id', 'id');
    }
}
