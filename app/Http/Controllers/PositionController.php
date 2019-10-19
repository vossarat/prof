<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PositionController extends Controller
{
	public function __construct(Position $position)
	{
		$this->position = $position;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('references.position.index')->with([        
			'viewdata' => $this->position->orderBy('id','asc')->get(),
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewdata = new Position;
        return view('references.position.create')->with([
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
      
        $position = Position::create($request->all());
	
		return redirect(route('position.index'))->with([
			'message' => "Должность $request->name добавлена",
		]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $position = $this->position->find($id);
       
        return view('references.position.edit')->with([
        	'viewdata' => $position,
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator( $request->all() );
        
        $position = $this->position->find($id);
        $position->update( $request->all() );
		$position->save();
        
        return redirect(route('position.index'))->with('message',"Информация по должности $position->name изменена");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = $this->position->find($id);
		$position->delete();
		return back()->with('message',"Информация по должности $position->name удалена");
    }
    
    protected function validator(array $data)
    {
        $validator = Validator::make($data, 
        	[
	        	'name' => 'required',
            ],            
            [           
	            'name.required' => 'укажите должность',
            ]
        )->validate();
    }
}
