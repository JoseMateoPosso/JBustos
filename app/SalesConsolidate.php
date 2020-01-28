<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesConsolidate extends Model
{
    //
    protected $fillable = [
    	'total_paid',
		'total_paid_sede',
		'total_dollars',
		'total_tokens',
    'percentage_paid',
		'percentage_sede',
    'paid',
		'paid_sede',
		'trm',
		'facturation_date',
    'page_id',
		'initial_date',
		'final_date',
		'model_id',
		'sede_id',
		'rule_id'
	];

	protected $hidden = [
		'created_by',
		'deleted_by'
    ];

    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'model_id', 'id');
    }

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

    public function regla()
    {
        return $this->belongsTo(FacturationRule::class, 'rule_id', 'id');
    }
}
