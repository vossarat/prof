<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treasury extends Model
{
    protected $table = 'treasuries';
    
	protected $dates = [
        'created_at',
        'updated_at',
        'date_of_entry',
    ];
    
	protected $fillable = [
		'date_of_entry',
		'count',
		'salary',
	];
}
