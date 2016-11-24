<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralPageWebsite extends Model {
	protected $table = 'general_page_website';

	public function website(){
		return $this->hasMany('App\GeneralPageContents');
	}

}

