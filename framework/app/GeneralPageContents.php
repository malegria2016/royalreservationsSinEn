<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GeneralPageContents extends Model {

	public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
    public function scopeIdentifier($query, $identifier){
		return $query->whereIdentifier($identifier);
	}
	public function websites(){
		return $this->belongsToMany('App\Website');
	}
}
