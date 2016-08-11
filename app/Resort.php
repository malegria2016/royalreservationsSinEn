<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Resort extends Model {

	public function contents(){
		return $this->hasMany('App\ResortContent');
	}
	
	public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
    public function scopeMain($query)
    {
        return $query->whereMain(1);
    }
    public function scopeMexico($query)
    {
        return $query->whereLocation('Mexican Caribbean');
    }
    public function scopeCaribbean($query)
    {
        return $query->whereLocation('Caribbean Islands');
    }
    
    public function scopeIdentifier($query, $identifier){
		return $query->whereIdentifier($identifier);
	}
	public function accommodations(){
		
		return $this->hasMany('App\Accommodation');
	}
	
	public function dinings(){
		return $this->hasMany('App\Dining');
	}
	
	public function activities(){
		return $this->hasMany('App\Activity');
	}
	
	public function offers(){
		return $this->belongsToMany('App\Offer');
	}
	
	public function destinations(){
		return $this->belongsToMany('App\Destination');
	}
	public function experiences(){
		return $this->belongsToMany('App\Experience');
	}

}
