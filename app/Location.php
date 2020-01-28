<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable = [
    	'description',
		  'parent_id',
      'category_id'
    ];

   protected $hidden = [
		'created_by',
		'deleted_by'
   ];

  public function parent()
  {
      return $this->belongsTo(Location::class, 'parent_id', 'id');
  }

  public function category()
  {
      return $this->belongsTo(Categories::class, 'category_id', 'id');
  }
}
