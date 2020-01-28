<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    //protected $table = 'dctomodelo';
    protected $fillable =[
    	'account_number',
		'own_number',
		'own_name',
		'model_id',
		'account_type',
		'status_id'
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

    public function accountType(){
        return $this->belongsTo(BasicInformation::class, 'account_type', 'id');
    }

    public function modelo(){
        return $this->belongsTo(Modelo::class, 'model_id', 'id');
    }

    public function historicalChanges()
    {
        return $this->morphMany(HistoricalChange::class, 'changeable');
    }

}
