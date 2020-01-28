<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    //
    protected $fillable = [
    	'trmorig',
		'trmest',
		'percentageorig',
		'percentageest',
		'status_id',
		'sale_consolidate_id'
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

    public function salesConsolidate()
    {
        return $this->belongsTo(SalesConsolidate::class, 'sale_consolidate_id', 'id');
    }

    public function historicalChanges()
    {
        return $this->morphMany(HistoricalChange::class, 'changeable');
    }
}
