<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Employee extends Model
{

	 use SoftDeletes;
   protected $primaryKey = 'id';
   protected $dates = ['deleted_at'];
   protected $fillable = [

   						'name',
   						'address',
   						'email',
   						'phone',
   						'emp_type',
   						'emp_photo'
   						 ];
   						 
public function user()
 {
   return $this->belongsTo('App\User');
 }				 
	
}
