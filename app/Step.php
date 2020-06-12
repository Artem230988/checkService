<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    public $fillable = ['body', 'completed'];


    public function check()
    {
    	return $this->belongsTo(Check::class);
    }

    public function complete()
    {
    	return $this->completed;
    }


}
