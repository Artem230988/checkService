<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    
	public $fillable = ['user_id', 'permission_name'];
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
