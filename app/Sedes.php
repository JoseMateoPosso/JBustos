<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sedes extends Model
{
    //
    protected $fillable = [
    	'name',
		'representative',
		'phone',
		'address',
        'email',
        'type',
		'neighborhood_id',
		'city_id',
		'studio_id',
		'status_id'
	];

	protected $hidden = [
		'created_by',
		'deleted_by'
    ];

    public function Estado()
    {
        return $this->belongsTo(Statuses::class, 'status_id', 'id');
    }

    public function Creador()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function Eliminador()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

    public function Barrio()
    {
        return $this->belongsTo(Location::class, 'neighborhood_id', 'id');
    }

    public function Ciudad()
    {
        return $this->belongsTo(Location::class, 'city_id', 'id');
    }

    public function Estudio()
    {
        return $this->belongsTo(Studio::class, 'studio_id', 'id');
    }

    public function cambiosHistoricos()
    {
        return $this->morphMany(HistoricalChange::class, 'changeable');
    }
}
