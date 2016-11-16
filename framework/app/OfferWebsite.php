<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferWebsite extends Model {
	protected $table = 'offer_website';

	public function website(){
		return $this->hasMany('App\Offer');
	}

}

