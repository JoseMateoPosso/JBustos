<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParametersValue extends Model
{
    //
    protected $fillable = [
    	'value',
		'parameter_id',
		'sedes_id'
	];

	public function parameter()
    {
        return $this->belongsTo(Parameter::class, 'parameter_id', 'id');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sedes_id', 'id');
    }
}
