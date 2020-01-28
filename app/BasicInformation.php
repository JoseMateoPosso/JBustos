<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicInformation extends Model
{
    //
    protected $fillable = [
    	'description',
		'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
}
