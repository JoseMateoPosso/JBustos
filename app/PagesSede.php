<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagesSede extends Model
{
    //
    protected $fillable = [
    	'sede_id',
		'page_id',
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

    public function pagina()
    {
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }
}
