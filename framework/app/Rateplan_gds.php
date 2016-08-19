<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rateplan_gds extends Model
{
	protected $table = 'rateplan_gds';

	public function scopeStatus($query)
    {
        return $query->whereStatus(1);
    }
    public function scopeResort($query, $identifier)
    {
        return $query->whereId_hotel($identifier);
    }	
}
