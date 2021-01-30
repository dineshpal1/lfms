<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Document extends Model
{
	use SoftDeletes;
     protected $primaryKey = 'id';
      protected $dates = ['deleted_at'];
     protected $fillable = ['template_name','uploaded_template','extension'];				
   						
   						

   						
}
