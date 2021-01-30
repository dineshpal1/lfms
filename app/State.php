<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $primaryKey = 'id';
	public $timestamps = false;

	 protected $fillable = ['name','country_id'];
}
