<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class resort_gds extends Model
{
	protected $table = 'resort_gds';

	public function scopeStatus($query)
    {
        return $query->whereStatus(1);
    }
    /*public function scopeResort($query, $identifier)
    {
        return $query->whereId_resort($identifier);
    }*/	
	
}
