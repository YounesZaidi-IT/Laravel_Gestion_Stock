<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use Notifiable;
	
    protected $fillable = [
        'name', 'quantity', 'price','color','capacite','systeme','picture'
    ];
}
