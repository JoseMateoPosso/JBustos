<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicit extends Model
{
    //

    protected $table = 'requests';

    protected $fillable = [
    	'nickname_orig',
		'nickname_suggest',
		'observation',
		'page_id',
		'sede_id_orig',
		'sede_id_dest',
		'nick_id',
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

    // public function created()
    // {
    //     return $this->belongsTo(User::class, 'created_by', 'id');
    // }

    // public function deleted()
    // {
    //     return $this->belongsTo(User::class, 'deleted_by', 'id');
    // }

    // public function page()
    // {
    //     return $this->belongsTo(Page::class, 'page_id', 'id');
    // }

    // public function sedeOrig()
    // {
    //     return $this->belongsTo(Sede::class, 'sede_id_orig', 'id');
    // }

    // public function sedeDest()
    // {
    //     return $this->belongsTo(Sede::class, 'sede_id_dest', 'id');
    // }

    // public function nick()
    // {
    //     return $this->belongsTo(Nick::class, 'nick_id', 'id');
    // }

    // public function files()
    // {
    //     return $this->morphMany(UploadFile::class, 'uploadable');
    // }

    // public function historicalChanges()
    // {
    //     return $this->morphMany(HistoricalChange::class, 'changeable');
    // }
}
