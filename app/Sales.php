<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //
	protected $fillable = [
		'tokens',
		'dollars',
		'sales_date',
		'page_id',
		'sede_id',
		'nick_id',
		'consolidate_id'
	];

	protected $hidden = [
		'created_by',
		'deleted_by'
	];

	public function pagina()
    {
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function eliminador()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

    public function sedeinfo()
    {
        return $this->belongsTo(Sede::class, 'sede_id', 'id');
    }

    public function nickinfo()
    {
        return $this->belongsTo(Nick::class, 'nick_id', 'id');
    }

    public function consolidado()
    {
        return $this->belongsTo(SalesConsolidate::class, 'consolidate_id', 'id');
    }

    
}
