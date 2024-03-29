<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterAccount extends Model
{
    //
    protected $fillable = [
    	'description',
		'status_id'
    ];

    protected $hidden = [
		'created_by',
		'deleted_by'
    ];

    public function status()
    {
        return $this->belongsTo(Statuses::class, 'status_id', 'id');
    }

    public function created()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function deleted()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }
}
