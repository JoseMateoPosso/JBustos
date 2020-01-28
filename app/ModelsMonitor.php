<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelsMonitor extends Model
{
    //
	protected $fillable = [
		'initial_date',
		'final_date',
		'model_id',
		'monitor_id'
	];

	public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'model_id', 'id');
    }

    public function monitor()
    {
        return $this->belongsTo(Monitor::class, 'monitor_id', 'id');
    }

    public function historicalChanges()
    {
        return $this->morphMany(HistoricalChange::class, 'changeable');
    }
}
