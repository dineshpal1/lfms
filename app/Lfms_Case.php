<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lfms_Case extends Model
{
   use SoftDeletes;
   
   protected $primaryKey = 'id';
   protected $dates = ['deleted_at'];
   protected $table = 'cases';
   protected $fillable = [
   						'casetitle',
   						'judgename',
   						'courtname',
   						'hearing_date',
   						'emp_name',
   						'emp_email',
   						'emp_phone',
   						'client_name',
   						'client_phone ',
   						'client_email',
   						'notes',
   						'documents'
   						];
}
