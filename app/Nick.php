<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nick extends Model
{
    //
	protected $fillable = [
		'nickname',
		'password',
		'url',
		'page_id',
        'ownable_type',
        'ownable_id',
		'category_id',
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

    public function categoria(){
    	return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function pagina(){
    	return $this->belongsTo(Page::class, 'page_id', 'id');
    }

    public function ownable(){
    	return $this->morphTo();
    }

    public function cambiosHistoricos()
    {
        return $this->morphMany(HistoricalChange::class, 'changeable');
    }
}
