<?php

namespace App\Http\Controllers;

use App\User;
use App\Mo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
	public function __construct(User $user, Mo $mos)
	{
		$this->user = $user;
		$this->mos = $mos;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('references.user.index')->with([        
			'viewdata' => $this->user->orderBy('id','asc')->get(),
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewdata = new User;
        return view('references.user.create')->with([
			'viewdata' => $viewdata,
			'mos' => $this->mos->orderBy('name','asc')->get(),
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
      	
      	$request->merge([ 'password' => bcrypt($request->password) ]);
        $user = user::create($request->all());
	
		return redirect(route('user.index'))->with([
			'message' => "Пользователь $request->name добавлена",
		]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $user = $this->user->find($id);
       
        return view('references.user.edit')->with([
        	'viewdata' => $user,
        	'mos' => $this->mos->orderBy('name','asc')->get(),
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator( $request->all() );
        
        $user = $this->user->find($id);
        
        $request->merge([ 'password' => bcrypt($request->password) ]);
        
        $user->update( $request->all() );
		$user->save();
        
        return redirect(route('user.index'))->with('message',"Информация по пользователю $user->name изменена");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);
		$user->delete();
		return back()->with('message',"Информация по пользователю $user->name удалена");
    }
    
    protected function validator(array $data)
    {
        $validator = Validator::make($data, 
        	[
	        	'name' => 'required',
	        	'password' => 'required',
            ],            
            [           
	            'name.required' => 'укажите логин',
	            'password.required' => 'укажите пароль',
            ]
        )->validate();
    }
}
