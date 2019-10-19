<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mo extends Model
{
    protected $table = 'mos';
    
	protected $dates = [
        'created_at',
        'updated_at',
    ];
    
	protected $fillable = [
		'name',
	];
}
