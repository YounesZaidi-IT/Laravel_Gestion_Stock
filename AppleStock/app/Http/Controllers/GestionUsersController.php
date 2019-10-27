<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Checkusers;
use Illuminate\Support\Facades\Validator;

class GestionUsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
	
    protected function validator(array $data){
        return Validator::make($data, [
            'name2'     => ['required', 'string', 'max:255'],
			'function2' => ['required', 'string', 'max:255',"in:admin,user"],
			'country2'  => ['required', 'string', 'max:255'],
            'email2'    => ['required', 'string', 'email', 'max:255'],
			'idname'    => ['required', 'integer'],
        ]);
    }
	
    function users(){
	   //Eloquent
	   //$name = \DB::table('users')->get();
	   
	   $name = \DB::select('select * from users');
	   return view ('users',compact('name'));
	}
	
    function deleteUsers($id){
	   //Eloquent
	   //$name = \DB::table('users')->where('id', $id)->delete();
	     try {
	       $name = \DB::delete('delete from users where id = ?',[$id]);
		 } catch( \Exception $e) {
		     return redirect()->back()->with('alert', '"Cannot delete or update a parent row: a foreign key constraint!');
		 }
	   return redirect()->route('loadusers');
    }
	
    public function ajaxRequestPostUpdateUser(Request $request){
        $input = $request->all();
		//Eloquent
		//$name = \DB::table('users')->select('id','name','email','function','country')->where('id', $input['iduser'])->get();
		
		$name = \DB::select('select id,name,email,function,country from users where id = ?',[$input['iduser']]);
		
        return response()->json(['success'=>$name]);
    }
	
	public function ajaxUpdate(Request $request){
		$this->validator($request->all())->validate();
		$input = $request->all();
		//Eloquent
		/*$upate = \DB::table('users')
                            ->where('id', $input['idname'])
                            ->update( 
			                array( 
			                     'name' => $input['name2'],
							     'email' => $input['email2'],
							     'function' => $input['function2'],
							     'country' => $input['country2']
							)
					    );
		*/
					
	    $name =  \DB::update('update users set name = "'.$input['name2'].'" ,email= "'.$input['email2'].'" ,function= "'.$input['function2'].'",country = "'.$input['country2'].'" where id = '.$input['idname'].' ');
		
	    return redirect()->route('loadusers');
	}
	
}
