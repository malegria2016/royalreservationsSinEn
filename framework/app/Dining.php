<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Dining extends Model {

	public function resort(){
		return $this->belongsTo('App\Resort');
	}
	
	public function contents(){
		return $this->hasMany('App\DiningContent');
	}

}
