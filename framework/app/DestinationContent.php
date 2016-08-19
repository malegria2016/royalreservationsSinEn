<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DestinationContent extends Model {

	public function destination(){
		return $this->belongsTo('App\Destination');
	}

}
