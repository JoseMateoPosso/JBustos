<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
	protected $fillable = [
		'name',
		'url',
		'url_login',
    'column_nick',
    'column_value',
		'status_id',
		'category_id'
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

    public function categoria()
    {
    	return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
}
