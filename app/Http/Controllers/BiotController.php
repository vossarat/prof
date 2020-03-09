<?php

namespace App\Http\Controllers;

use App\Biot;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BiotController extends Controller
{
	public function __construct(Biot $biot)
	{		
		$this->biot = $biot;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('biot.index')->with([        
			'viewdata' => $this->biot->all(),
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewdata = new Biot;
        return view('biot.create')->with([
			'viewdata' => $viewdata,
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator( $request->all() );
    	
    	$date_of_entry = new Carbon($request->date_of_entry);		
		$request->merge([ 'date_of_entry' => $date_of_entry ]);
    	
    	$biot = Biot::create($request->all());
        
		return redirect(route('biot.index'))->with([
			'message' => "Информация по дате $request->date_of_entry добавлена",
		]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Biot  $biot
     * @return \Illuminate\Http\Response
     */
    public function show(Biot $biot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Biot  $biot
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biot = $this->biot->find($id);
        
        return view('biot.edit')->with([
        	'viewdata' => $biot,
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Biot  $biot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator( $request->all() );
    	
		$date_of_entry = new Carbon($request->date_of_entry);		
		$request->merge([ 'date_of_entry' => $date_of_entry ]);
    	    	 	
        $biot = $this->biot->find($id);
       
		$biot->update( $request->all() ); //основная информация
		$biot->save();
        
        return redirect(route('biot.index'))->with('message',"Информация по дате $request->date_of_entry изменена");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Biot  $biot
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biot = $this->biot->find($id);		
		$biot->delete();
		return back()->with('message',"Информация по дате $biot->date_of_entry удалена");
    }
    
    protected function validator(array $data)
    {
        $validator = Validator::make($data, 
        	[
	        	'indicator_1' => 'nullable|integer',
	        	'indicator_2' => 'nullable|integer',
	        	'indicator_7' => 'nullable|integer',
	        	'indicator_8' => 'nullable|integer',
	        	'indicator_9' => 'nullable|integer',
	        	'indicator_10' => 'nullable|integer',
	        	'indicator_11' => 'nullable|integer',
	        	'indicator_12' => 'nullable|integer',
	        	'indicator_13' => 'nullable|integer',
	        	'indicator_14' => 'nullable|integer',
	        	'indicator_15' => 'nullable|integer',
	        	'indicator_16' => 'nullable|integer',
	        	'indicator_17' => 'nullable|integer',
	        	'indicator_18' => 'nullable|integer',
	        	'indicator_19' => 'nullable|integer',
	        	'date_of_entry' => 'required|date_format:"d.m.Y"',
            ],            
            [           
	        	'required' => 'это поле обязательно к заполнению',
	        	'integer' => 'введите только число',
	        	'date_format' => 'некорректная дата',
            ]
        )->validate();
    }
}
