<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model {

	public function contents(){
		return $this->hasMany('App\ExperienceContent');
	}
	
	public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
  
    public function scopeIdentifier($query, $identifier){
		return $query->whereIdentifier($identifier);
	}
	
	public function resorts(){
		return $this->belongsToMany('App\Resort');
	}

}
