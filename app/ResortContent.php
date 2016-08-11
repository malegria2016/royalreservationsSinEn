<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ResortContent extends Model {

	public function resort(){
		return $this->belongsTo('App\Resort');
	}

}
