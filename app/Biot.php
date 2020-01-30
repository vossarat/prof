<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biot extends Model
{
    protected $table = 'biots';
    
	protected $dates = [
        'created_at',
        'updated_at',
        'date_of_entry',
    ];
    
	protected $fillable = [
		'date_of_entry',
		'indicator_1',
		'indicator_2',
		'indicator_3',
		'indicator_4',
		'indicator_5',
		'indicator_6',
		'indicator_7',
		'indicator_8',
		'indicator_9',
		'indicator_10',
		'indicator_11',
		'indicator_12',
		'indicator_13',
		'indicator_14',
		'indicator_15',
		'indicator_16',
		'indicator_17',
		'indicator_18',
		'indicator_19',
	];
}
