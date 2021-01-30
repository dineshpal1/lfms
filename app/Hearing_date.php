<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hearing_date extends Model
{
     use SoftDeletes;
     protected $primaryKey = 'id';
     protected $fillable = ['case_id','extension','date_of_hearing','notes_updated','order_judgement','next_date'];
}
