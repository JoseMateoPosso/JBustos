<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    //
	protected $fillable = [
		'identification',
		'name',
		'lastname',
		'address',
		'email',
		'cellphone',
		'admission_date',
		'properties',
		'status_id',
		'category_id',
		'eps_id',
		'afp_id',
		'ccf_id',
		'city_id'
	];
	
	protected $hidden = [
		'created_by',
		'deleted_by'
	];

	public function status()
    {
        return $this->belongsTo(Statuses::class, 'status_id', 'id');
    }

    public function created()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function deleted()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

	public function eps()
    {
        return $this->belongsTo(BasicInformation::class, 'eps_id', 'id');
    }

	public function afp()
    {
        return $this->belongsTo(BasicInformation::class, 'afp_id', 'id');
    }

	public function ccf()
    {
        return $this->belongsTo(BasicInformation::class, 'ccf_id', 'id');
    }
    
	public function city()
    {
        return $this->belongsTo(Location::class, 'city_id', 'id');
    }

    public function files()
    {
        return $this->morphMany(UploadFile::class, 'uploadable');
    }

    public function historicalChanges()
    {
        return $this->morphMany(HistoricalChange::class, 'changeable');
    }
}
