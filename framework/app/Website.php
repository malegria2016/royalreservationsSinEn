<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model {
	public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
	public function offers(){
		return $this->belongsToMany('App\Offer');
	}
}
