<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Offer extends Model {

	public function contents(){
		return $this->hasMany('App\OfferContent');
	}

	public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
    public function scopeMain($query)
    {
        return $query->whereMain(1);
    }
    public function scopeIdentifier($query, $identifier){
		return $query->whereIdentifier($identifier);
	}
	public function scopeRange($query){
		return $query->where('start_date', '<=',Carbon::now())->where('end_date',">", Carbon::now());
	}

	public function resorts(){
		return $this->belongsToMany('App\Resort');
	}
}
