<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceContent extends Model {

	public function destination(){
		return $this->belongsTo('App\Experience');
	}

}
