<?php

namespace App\Http\Controllers;

use App\Card;
use App\Position;
use App\ChildBirthday;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
	public function __construct(Card $card, Position $positions)
	{		
		$this->card = $card;
		$this->positions = $positions;
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('card.index')->with([        
			'viewdata' => $this->card->where('user_id', \Auth::id())->orderBy('id','desc')->paginate(30),
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewdata = new Card;
        return view('card.create')->with([
			'viewdata' => $viewdata,
			'child_birthdays' => [],
			'positions' => $this->positions->orderBy('name','asc')->get(),
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
    	
    	$birthday = new Carbon($request->birthday);		
		$request->merge([ 'birthday' => $birthday ]);
    	
    	$experience = new Carbon($request->experience);		
		$request->merge([ 'experience' => $experience ]);
    	
    	/*$experience_special = new Carbon($request->experience_special);		
		$request->merge([ 'experience_special' => $experience_special ]);
    	
    	$tradeunion = new Carbon($request->tradeunion);		
		$request->merge([ 'tradeunion' => $tradeunion ]);*/
    	
        $card = Card::create($request->all());
        
        if ( $request->has('child_birthdays') ) {
			$child_birthdays = $request->child_birthdays;
			foreach($child_birthdays as $item){
				$syncData[] = array( 'card_id' => $card->id, 'birthday' => $item );
			}
			$insertChildBirthday = ChildBirthday::insert($syncData);
		}
        
		return redirect(route('card.index'))->with([
			'message' => "Сотрудник $request->surname $request->name добавлен",
		]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $card = $this->card->find($id);
        
        $childBirthdays = ChildBirthday::where('card_id', $id)->select()->get();
        
        return view('card.edit')->with([
        	'viewdata' => $card,
        	'child_birthdays' => $childBirthdays,
        	'positions' => $this->positions->orderBy('name','asc')->get(),
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator( $request->all() );
    	
		$birthday = new Carbon($request->birthday);		
		$request->merge([ 'birthday' => $birthday ]);
    	
    	$experience = new Carbon($request->experience);		
		$request->merge([ 'experience' => $experience ]);
    	
    	/*$experience_special = new Carbon($request->experience_special);		
		$request->merge([ 'experience_special' => $experience_special ]);
    	
    	$tradeunion = new Carbon($request->tradeunion);		
		$request->merge([ 'tradeunion' => $tradeunion ]);*/
		
  	
        $card = $this->card->find($id);
        
		$deleteChildBirthday = ChildBirthday::where('card_id',$id)->delete();
		if ( $request->has('child_birthdays') ) {
			$child_birthdays = $request->child_birthdays;
			foreach($child_birthdays as $item){
				$syncData[] = array( 'card_id' => $id, 'birthday' => $item );
			}
			$insertChildBirthday = ChildBirthday::insert($syncData);
		}
        
		$card->update( $request->all() ); //основная информация
		$card->save();
        
        return redirect(route('card.index'))->with('message',"Информация по сотруднику $card->full_name изменена");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = $this->card->find($id);
		$deleteChildBirthday = ChildBirthday::where('card_id', $id)->delete();
		$card->delete();
		return back()->with('message',"Информация по сотруднику $card->full_name удалена");
    }
    
    protected function validator(array $data)
    {
        $validator = Validator::make($data, 
        	[
	        	'surname' => 'required',
	        	'name' => 'required',
	        	'sex_id' => 'required|integer',
	        	'birthday' => 'required|date_format:"d.m.Y"',
	        	'experience' => 'required|date_format:"d.m.Y"',
	        	//'experience_special' => 'required|date_format:"d.m.Y"',
	        	//'tradeunion' => 'required|date_format:"d.m.Y"',
            ],            
            [           
	            'surname.required' => 'укажите имя',
	            'birthday.required' => 'укажите дату рождения',
	            'experience.required' => 'укажите дату начала трудового стажа',
	            //'experience_special.required' => 'укажите дату начала работы по специальности',
	            //'tradeunion.required' => 'укажите дату вступления в профсоюз',
	            'name.required' => 'укажите имя',
	            'sex_id.integer' => 'укажите пол',
	        	'date_format' => 'некорректная дата',
            ]
        )->validate();
    }
}
