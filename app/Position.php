<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
    
	protected $dates = [
        'created_at',
        'updated_at',
    ];
    
	protected $fillable = [
		'name',
	];
}
