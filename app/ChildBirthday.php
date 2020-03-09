<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Card;

class ChildBirthday extends Model
{
	protected $table = 'child_birthdays';
    
	protected $fillable = [
		'card_id',
		'birthday',
	];
	
/*    public function card()
    {
    	return $this->belongsToMany('App\Card')->withPivot('birthday');
    }*/
}
