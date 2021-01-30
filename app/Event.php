<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['event_title','from','to','event_type','location','Client_id'];
}
