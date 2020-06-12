<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    public $fillable = ['title', 'description', 'completed', 'owner_id'];

    public function steps()
    {
    	return $this->hasMany(Step::class); 
    }


}
