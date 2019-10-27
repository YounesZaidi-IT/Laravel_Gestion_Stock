<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use Notifiable;
	
    protected $fillable = [
	          'userid','productid','total'
    ];
}
