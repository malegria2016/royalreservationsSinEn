<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model {

public function contents(){
		return $this->hasMany('App\PackageContent');
	}
	
	public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
    public function scopeIdentifier($query, $identifier){
		return $query->whereIdentifier($identifier);
	}
}
