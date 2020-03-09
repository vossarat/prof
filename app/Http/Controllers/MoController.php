<?php

namespace App\Http\Controllers;

use App\Mo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class moController extends Controller
{
	public function __construct(Mo $mo)
	{
		$this->mo = $mo;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('references.mo.index')->with([        
			'viewdata' => $this->mo->orderBy('id','asc')->get(),
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewdata = new Mo;
        return view('references.mo.create')->with([
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
      
        $mo = mo::create($request->all());
	
		return redirect(route('mo.index'))->with([
			'message' => "Медицинская организация $request->name добавлена",
		]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mo  $mo
     * @return \Illuminate\Http\Response
     */
    public function show(mo $mo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mo  $mo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $mo = $this->mo->find($id);
       
        return view('references.mo.edit')->with([
        	'viewdata' => $mo,
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mo  $mo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator( $request->all() );
        
        $mo = $this->mo->find($id);
        $mo->update( $request->all() );
		$mo->save();
        
        return redirect(route('mo.index'))->with('message',"Информация по медицинской организации $mo->name изменена");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mo  $mo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mo = $this->mo->find($id);
		$mo->delete();
		return back()->with('message',"Информация по медицинской организации $mo->name удалена");
    }
    
    protected function validator(array $data)
    {
        $validator = Validator::make($data, 
        	[
	        	'name' => 'required',
            ],            
            [           
	            'name.required' => 'укажите МО',
            ]
        )->validate();
    }
}
