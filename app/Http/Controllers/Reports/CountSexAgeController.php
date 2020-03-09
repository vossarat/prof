<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Mo;
use App\Card;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CountSexAgeController extends Controller
{
	public function __construct(Request $request)
	{
		$this->request = $request;
	}
	
    public function index()
	{
    	if ($this->request->isMethod('get')) {
			return view('reports.cnt_sex_age')->with([
				'viewdata' => array(),
			]);
		}
		
		$this->validator( $this->request->all() );
		
		$startdate = new Carbon($this->request->startdate);
		$enddate = new Carbon($this->request->enddate);
		
		$query = Card::query();
		if ( \Auth::id() > 1 ) {
		    $query = $query->where( 'user_id', Auth::id() );
		}
		
		$cards = $query->get();
		
		$ages_report = array(
			array( 18,20 ),
			array( 21,30 ),
			array( 31,40 ),
			array( 41,50 ),
			array( 51,60 ),
			array( 61,70 ),
			array( 71,80 ),
		);
		
		foreach( $ages_report as $age ) {
			${"age_$age[0]_$age[1]"} = $cards->filter(function ($item) use($age) {
			    return Carbon::parse($item['birthday'])->age >= $age[0] && Carbon::parse($item['birthday'])->age <= $age[1] ;
			});
		}
		
		return view('reports.cnt_sex_age_output')->with([
			'startdate' => date("d-m-Y",strtotime($this->request->startdate)),
			'enddate' => date("d-m-Y",strtotime($this->request->enddate)),
			'moName' => Auth::user()->id > 1 ? Auth::user()->mo->name : 'по всем МО',
			'age_18_20' => $age_18_20,
			'age_21_30' => $age_21_30,
			'age_31_40' => $age_31_40,
			'age_41_50' => $age_41_50,
			'age_51_60' => $age_51_60,
			'age_61_70' => $age_61_70,
			'age_71_80' => $age_71_80,
			'ages_report' => $ages_report,
			'allcards' => $cards,
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
