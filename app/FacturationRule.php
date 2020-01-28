<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturationRule extends Model
{
    //
    protected $fillable = [
    	'init_date',
		'final_date',
		'minimun',
		'maximum',
		'percentage',
		'trm',
		'page_id',
		'model_id',
		'sede_id',
		'studio_id',
		'status_id',
		'location_id'
	];

	protected $hidden = [
		'created_by',
		'deleted_by'
	];

    public function estado()
    {
        return $this->belongsTo(Statuses::class, 'status_id', 'id');
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function eliminador()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

    public function pagina(){
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }

    public function infomodelo(){
        return $this->belongsTo(Modelo::class, 'model_id', 'id');
    }

    public function sede(){
        return $this->belongsTo(Sedes::class, 'sede_id', 'id');
    }

    public function estudio(){
        return $this->belongsTo(Studio::class, 'studio_id', 'id');
    }

    public function ubicacion(){
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

    public function cambioshistoricos()
    {
        return $this->morphMany(HistoricalChange::class, 'changeable');
    }
}
