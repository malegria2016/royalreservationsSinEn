<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DiningContent extends Model {

	public function dining(){
		return $this->belongsTo('App\Dining');
	}

}
