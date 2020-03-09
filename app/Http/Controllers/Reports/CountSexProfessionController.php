<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Mo;
use App\Position;
use App\Card;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class CountSexProfessionController extends Controller
{
   public function __construct(Request $request)
	{
		$this->request = $request;
	}
	
    public function index()
	{
    	if ($this->request->isMethod('get')) {
			return view('reports.cnt_sex_proffesion')->with([
				'viewdata' => array(),
			]);
		}
		
		$this->validator( $this->request->all() );
		
		$startdate = new Carbon($this->request->startdate);
		$enddate = new Carbon($this->request->enddate);		
		
		$cards = Card::where( 'user_id', Auth::id() )->get();
		$professions = $cards->groupBy('position_id');
		//dd($professions);
		
		return view('reports.cnt_sex_proffesion_output')->with([
			'startdate' => date("d-m-Y",strtotime($this->request->startdate)),
			'enddate' => date("d-m-Y",strtotime($this->request->enddate)),
			'moName' => Auth::user()->mo->name,
			'viewdata' => $professions,
			'positions' => Position::all(),
			'cards' => $cards,
		]);
		
	}
		
	protected function validator(array $data)
    {
        $validator = Validator::make($data, 
        	[
	        	'startdate' => 'required|date_format:"d.m.Y"',
	        	'enddate' => 'required|date_format:"d.m.Y"',
            ],            
            [           
	            'required' => 'укажите дату',
	        	'date_format' => 'некорректная дата',
            ]
        )->validate();
    }
}
