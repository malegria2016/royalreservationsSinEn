<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resort_policy extends Model
{
	protected $table = 'resort_policies';

	public function scopeGeneral($query)
    {
        return $query->whereGeneral(1);
    }
    public function scopeResort($query, $identifier)
    {
        return $query->whereId_resort($identifier);
    }	
}
