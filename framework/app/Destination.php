<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model {

	public function contents(){
		return $this->hasMany('App\DestinationContent');
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
	
	public function resorts(){
		return $this->belongsToMany('App\Resort');
	}

}
