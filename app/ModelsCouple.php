<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelsCouple extends Model
{
    //
    protected $fillable = [
    	'model_id',
		'couple_id',
		'status_id'
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

    public function modeloinfo()
    {
        return $this->belongsTo(Modelo::class, 'model_id', 'id');
    }

    public function pareja()
    {
        return $this->belongsTo(Modelo::class, 'couple_id', 'id');
    }

    public function nickinfo()
    {
        return $this->morphMany(Nick::class, 'ownable');
    }

    public function archivos()
    {
        return $this->morphMany(UploadFile::class, 'uploadable');
    }

    public function cambioshistoricos()
    {
        return $this->morphMany(HistoricalChange::class, 'changeable');
    }    
}
