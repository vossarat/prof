<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Card;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CountItsHomeController extends Controller
{
    public function __construct(Request $request)
	{
		$this->request = $request;
	}
	
	public function index()
	{	
    	if ($this->request->isMethod('get')) {
			return view('reports.cnt_itshome')->with([
				'viewdata' => array(),
			]);
		}
		
		$this->validator( $this->request->all() );
		
		$startdate = new Carbon($this->request->startdate);
		$enddate = new Carbon($this->request->enddate);
		
		$query = Card::query();		
		
		$query->select('mos.name', DB::raw('count(*) as total'), 
			DB::raw('SUM(case when cards.itshome = 1 then 1 else 0 end) as itshome'), 
			DB::raw('SUM(case when cards.itshome = 0 then 1 else 0 end) as itsnohome') 
		)
			->groupBy('mos.name')
			->leftJoin('users', 'cards.user_id', '=', 'users.id' )
			->leftJoin('mos', 'users.mo_id', '=', 'mos.id' ) 
			->whereBetween('cards.created_at', [$startdate, $enddate] ) ;
			
		if( \Auth::id() > 1 ) {
			$query->where( 'users.id', \Auth::id() ) ;
		}
			
		$viewdata = $query->get();
		
		return view('reports.cnt_itshome_output')->with([
			'viewdata' => $viewdata,
			'startdate' => date("d-m-Y",strtotime($this->request->startdate)),
			'enddate' => date("d-m-Y",strtotime($this->request->enddate)),
		]);
		
	}
	
	public function toPDF()
	{
		//dd(__METHOD__);
		
		$filename = 'test.pdf';
		$path = storage_path($filename);

		return Response::make(file_get_contents($path), 200, [
		    'Content-Type' => 'application/pdf',
		    'Content-Disposition' => 'inline; filename="'.$filename.'"'
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
