<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $primaryKey = 'id';
    protected $fillable=["role_name","guard_name"];


       public function users()
    {
    	return $this->hasMany("App\User");
    }
}
