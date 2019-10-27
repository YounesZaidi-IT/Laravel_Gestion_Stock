<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Checkusers;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
	
    function index(){
		$condition='';
        if(Auth::user()->function != 'admin')
	    $condition = " and t.userid = ".Auth::user()->id." "; 
	
	   $name = \DB::select('select sum(users) as users,sum(product) as product,sum(outstock) as outstock,sum(total) as total from (
	                           select count(*) as users,"" as product,"" as outstock,"" as total from users 
							       union all 
							   select "" as users,count(*) as product,"" as outstock,"" as total from product
							       union all 
							   select "" as users,"" as product,count(*) as outstock,"" as total from product where quantity = 0
							       union all
							   select "" as users,"" as product,"" as outstock ,sum(t.total*p.price) as total from transaction t, product p where t.productid=p.id '.$condition.'
							)as dd');
	   $data        = current($name);
	   $product     = \DB::select('select * from product order by id desc limit 5');
	   $cond2 = "";
	   
	   $transaction = \DB::select('select s.name as user,p.name,t.total,p.price,p.picture,p.color,p.capacite,t.created_at from transaction t,product p,users s where p.id=t.productid and s.id = t.userid '.$condition.' limit 15 ');
	
	   return view('dashboard',compact('data','product','transaction'));
    }
	
}
