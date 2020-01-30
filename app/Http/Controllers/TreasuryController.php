<?php

namespace App\Http\Controllers;

use App\Treasury;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TreasuryController extends Controller
{
    public function __construct(Treasury $treasury)
	{		
		$this->treasury = $treasury;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('treasury.index')->with([        
			'viewdata' => $this->treasury->all(),
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewdata = new treasury;
        return view('treasury.create')->with([
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
    	
    	$treasury = Treasury::create($request->all());
        
		return redirect(route('treasury.index'))->with([
			'message' => "Информация по дате $request->date_of_entry добавлена",
		]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\treasury  $treasury
     * @return \Illuminate\Http\Response
     */
    public function show(Treasury $treasury)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\treasury  $treasury
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $treasury = $this->treasury->find($id);
        
        return view('treasury.edit')->with([
        	'viewdata' => $treasury,
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\treasury  $treasury
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator( $request->all() );
    	
		$date_of_entry = new Carbon($request->date_of_entry);		
		$request->merge([ 'date_of_entry' => $date_of_entry ]);
    	    	 	
        $treasury = $this->treasury->find($id);
       
		$treasury->update( $request->all() ); //основная информация
		$treasury->save();
        
        return redirect(route('treasury.index'))->with('message',"Информация по дате $request->date_of_entry изменена");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\treasury  $treasury
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $treasury = $this->treasury->find($id);		
		$treasury->delete();
		return back()->with('message',"Информация по дате $treasury->date_of_entry удалена");
    }
    
    protected function validator(array $data)
    {
        $validator = Validator::make($data, 
        	[
	        	'count' => 'nullable|integer',
	        	'salary' => 'nullable|integer',
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
