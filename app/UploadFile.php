<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    //
    protected $fillable = [
    	'path',
		'status_id',
		'uploadable'
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

    public function uploadable(){
        return $this->morphTo();
    }
}
