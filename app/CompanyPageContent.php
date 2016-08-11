<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPageContent extends Model {
	
	public function companyPage(){
		return $this->belongsTo('App\CompanyPage');
	}

}
