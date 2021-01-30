<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Client extends Model
{
	use SoftDeletes;
   protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
   protected $fillable = [
   							'name',
   							'company',
   							'address1',
   							'address2',
   							'country',
   							'state',
   							'city',
   							'pincode',
   							'email',
   							'mobile1',
   							'mobile2',
   							'alternate_name',
   							'alternate_relation',
   							'alternate_email',
   							'alternate_phone',
   							'profile_photo',
							  'user_id'
   						 ];
}
