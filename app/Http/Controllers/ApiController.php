<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getMkb($icd)
    {
    	if( $icd == '' ) return  'НЕ УКАЗАНО';
    	$mkb = DB::table('mkb')->select()->where('icd', $icd)->first();
		if( count($mkb) == 0 ) return  'КОД ЗАБОЛЕВАНИЯ НЕ НАЙДЕН В СПРАВОЧНИКЕ';
		return  $mkb->name;
    }
}
