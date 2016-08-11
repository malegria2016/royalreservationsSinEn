<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferResort extends Model {

	/*public function resort(){
		//return $this->belongTo('App\Resort');
	}*/

	/*public function resorts(){
		return $this->belongsToMany('App\Resort');
	}*/

	protected $table = 'offer_resort';

	public function resort(){
		return $this->hasMany('App\Offer');
	}

}

