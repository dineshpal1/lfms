<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $primaryKey = 'id';
	public $timestamps = false;

	protected $fillable = ['name'];

}
