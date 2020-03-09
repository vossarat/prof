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

class CountSexAgeChildController extends Controller
{
    public function __construct(Request $request)
	{
		$this->request = $request;
	}
	
    public function index()
	{
    	if ($this->request->isMethod('get')) {
			return view('reports.cnt_sex_age_child')->with([
				'viewdata' => array(),
			]);
		}
		
		$this->validator( $this->request->all() );
		
		$startdate = new Carbon($this->request->startdate);
		$enddate = new Carbon($this->request->enddate);
		
		$userAuthId = Auth::id() ;
		
		$cards = Card::select( DB::raw( "STR_TO_DATE(child_birthdays.birthday, '%m.%d.%Y') as childbirthday") )
			->where(
				function($query) use ( $userAuthId ){
					if( $userAuthId > 1 ){
						$query->where('user_id', '=', $userAuthId);
					}
				})		
			->leftJoin('child_birthdays', function($join) {
		      $join->on('cards.id', '=', 'child_birthdays.card_id');
		    })
		    ->whereNotNull('child_birthdays.birthday')
		    ->get();
		
		
		$ages_report = array(
			array( 0,5 ),
			array( 6,7 ),
			array( 8,10 ),
			array( 11,14 ),
			array( 15,17 ),
		);
		
		foreach( $ages_report as $age ) {
			${"age_$age[0]_$age[1]"} = $cards->filter(function ($item) use($age) {
			    return Carbon::parse($item['childbirthday'])->age >= $age[0] && Carbon::parse($item['childbirthday'])->age <= $age[1] ;
			});
		}

		return view('reports.cnt_sex_age_child_output')->with([
			'startdate' => date("d-m-Y",strtotime($this->request->startdate)),
			'enddate' => date("d-m-Y",strtotime($this->request->enddate)),
			'moName' => Auth::user()->id > 1 ? Auth::user()->mo->name : 'по всем МО',
			'age_0_5' => $age_0_5,
			'age_6_7' => $age_6_7,
			'age_8_10' => $age_8_10,
			'age_11_14' => $age_11_14,
			'age_15_17' => $age_15_17,
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
