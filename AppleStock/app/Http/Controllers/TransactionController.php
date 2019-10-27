<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Checkusers;

class TransactionController extends Controller
{
    protected $redirectTo = '/dashboard';
	
    public function __construct(){
		$this->middleware('auth');
    }
	
	public function add_transaction(Request $request){
		$input = $request->all();
		$quantity = \DB::select('select quantity from product where id = ?',[$input['idproduct']]);
	    if(current($quantity)->quantity >= $input['productcount']){
		    $insert = \DB::insert('insert into transaction (userid,productid,total,created_at) values ("'.Auth::user()->id.'","'.$input['idproduct'].'","'.(int)$input['productcount'].'","'.date('Y-m-d').'" )');
			$new_quantity = intval(current($quantity)->quantity)-intval($input['productcount']);
	        $name =  \DB::update('update product set quantity= "'.$new_quantity.'" where id = '.$input['idproduct'].' ');
			if($insert)
			$message = 'done';
			else
			$message = 'Erore';
	    }else{
			$message = 'Erore';
		}
		return response()->json(['success'=>$message]);	
	}
	
	public function showtransaction(){
	   $name = \DB::select('select id,name,color from product order by id desc');
	   return view ('transaction',compact('name'));
	}
	
	public function get_product_info(Request $request){
		$input = $request->all();
		$name = \DB::select('select * from product where id = ?',[$input['idproduct']]);
		return response()->json(['success'=>$name]);	
	}
    
	public function listtransaction(){
		 $condition ="";
		 if(Auth::user()->function != 'admin'){
			$condition = " and t.userid = ".Auth::user()->id." "; 
		 }
		 $name = \DB::select('select t.created_at,t.id,t.userid,t.productid,u.name as user,t.total,p.name,p.quantity,p.price,p.color,p.capacite,p.systeme,p.picture from transaction t,product p,users u where t.productid = p.id and u.id=t.userid '.$condition.' ');
	     return view ('listtransaction',compact('name'));
	   
    }
	public function removeOrder($id){
		$count  = \DB::select('select total,productid from transaction where id = ?',[$id]);
		$update = \DB::update('update product set quantity = quantity + '.current($count)->total.' where id = '.current($count)->productid.' ');
		$delete = \DB::delete('delete from transaction where id = ?',[$id]);
	    return redirect()->route('listtransaction');
	}
	
	
	
	
}
