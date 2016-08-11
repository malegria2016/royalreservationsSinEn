<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPage extends Model {
	
	public function contents(){
		return $this->hasMany('App\CompanyPageContent');
	}
	
	public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
	public function scopeCompany($query, $company_id)
    {
        return $query->whereCompanyId($company_id);
    }
    public function scopeIdentifier($query, $identifier){
		return $query->whereIdentifier($identifier);
	}

}
