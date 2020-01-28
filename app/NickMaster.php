<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NickMaster extends Model
{
    //
	protected $fillable = [
		'nick_id',
        'master_id',
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

    public function nick()
    {
        return $this->belongsTo(Nick::class, 'nick_id', 'id');
    }

    public function master()
    {
        return $this->belongsTo(MasterAccount::class, 'master_id', 'id');
    }

    public function historicalChanges()
    {
        return $this->morphMany(HistoricalChange::class, 'changeable');
    }
}
