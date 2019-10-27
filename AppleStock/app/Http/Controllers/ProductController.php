<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Traits\UploadTrait;


class ProductController extends Controller
{
	protected $redirectTo = '/dashboard';
	
	
    public function __construct(){
		$this->middleware('auth');
    }
	
	public function showProductall(){
	   $name = \DB::select('select * from product order by id desc');
	   return view ('listproduct',compact('name'));
	}
	public function showProduct(){
	   $name = \DB::select('select * from product order by id desc limit 5');
	   return view ('product',compact('name'));
	}
	public function removeProduct($id){
		$select = \DB::select('select * from product where id = '.$id.' ');
		if($select){
		$query = current($select);
	    \DB::delete('delete from transaction where productid = ?',[$id]);
		\DB::delete('delete from product where id = ?',[$id]);
		unlink(public_path() .  '/images/' . $query->picture );
		}
		return redirect()->route('showall');
	}
	public function updateProduct(Request $request){
		$input = $request->all();
		$name = \DB::select('select id,name,quantity,price,color,capacite,systeme,picture from product where id = ?',[$input['idproduct']]);
		return response()->json(['success'=>$name]);
	}
	public function update_product(Request $request){
		$input = $request->all();
		$pic   = "";
		if($request->hasFile('Picture')){
			$image = $request->file('Picture');
			$name  = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/images');
			$image->move($destinationPath, $name);
			$pic   = ',Picture = "'.$name.'"  ';
			//unlink(public_path() .  '/images/' . $input['delete'] );
		}
	    $name =  \DB::update('update product set name = "'.$input['nameprocut'].'" ,quantity= "'.$input['Quantity'].'" ,price= "'.$input['Price'].'",color = "'.$input['Color'].'",capacite = "'.$input['Capacite'].'",systeme = "'.$input['Systeme'].'" '.$pic.' where id = '.$input['idproduct'].' ');
	    return redirect()->route('showall');
	}
	public function addProduct(Request $request){
		$input  = $request->all();
		$this->validate($request, [
		'nameprocut' => 'required',
		'Picture'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		'Quantity'   => 'required|integer',
		'Price'      => 'required|integer',
		'Color'      => 'required',
		'Capacite'   => 'required|integer',
		'Systeme'    => 'required'
		]);
		
		if ($request->hasFile('Picture')) {
			$image = $request->file('Picture');
			$name  = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/images');
			$image->move($destinationPath, $name);
		    $insert = \DB::insert('insert into product (name, quantity,price,color,capacite,systeme,picture,created_at) values ("'.$input['nameprocut'].'","'.$input['Quantity'].'","'.$input['Price'].'","'.$input['Color'].'","'.$input['Capacite'].'","'.$input['Systeme'].'","'.$name.'","'.date('Y-m-d').'" )');
		    return redirect()->route('showProduct');
		}
	}
	
}
