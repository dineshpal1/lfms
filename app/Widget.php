<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable=["widget_name","status"];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
