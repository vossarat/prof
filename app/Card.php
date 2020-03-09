<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\ChildBirthday;

class Card extends Model
{
    protected $table = 'cards';
    
	protected $dates = [
        'created_at',
        'updated_at',
        'birthday',
        'experience',
        'experience_special',
        'tradeunion',
    ];
    
	protected $fillable = [
		'surname',
		'name',
		'middlename',
		'birthday',
		'sex_id',
		'position_id', // должность
		'marital_status_id',// семейное положение
		'experience',// стаж
		'experience_special',// стаж по специальности
		'dispensary',//Д-учет
		'tradeunion',// дата принятия в профсоюз
		'itshome', // наличие собственного жилья
		'user_id', // Пользователь
	];
	
    
    public function getFullNameAttribute() {
        return "{$this->surname} {$this->name} {$this->middlename}";
    }
    
    public function position()
	{
		return $this->belongsTo(Position::class);
	}
    
    /*public function child_birthdays()
    {
    	return $this->hasMany('App\ChildBirthday')->withPivot('birthday');
    }*/
}
