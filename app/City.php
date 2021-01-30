<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
     protected $primaryKey = 'id';
	 public $timestamps = false;

	 protected $fillable = ['name','state_id'];

}
