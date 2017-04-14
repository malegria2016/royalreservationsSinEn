<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {

	public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

}
