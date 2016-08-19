<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityContent extends Model {

	public function activity(){
		return $this->belongsTo('App\Activity');
	}

}
