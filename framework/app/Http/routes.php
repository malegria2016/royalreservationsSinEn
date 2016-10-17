<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//$languages = Config::get('app.locales'); //returns array('hrv', 'eng')
$languages[0]="en";
$languages[1]="es";

$locale = Request::segment(1); //fetches first URI segment

//for default language ('hrv') set $locale prefix to "", otherwise set it to lang prefix
if (in_array($locale, $languages) && $locale != 'en') {
    App::setLocale($locale);
    $this->lang_id=2;
} else {
    App::setLocale('en');
    $locale = null;
    $this->lang_id=1;
}

Route::get('/','PagesController@home');
Route::get('/es','PagesController@inicio');
Route::group(array('prefix' => $locale), function() {
	
	Route::get('webcams','PagesController@webcamsShow');
	Route::get('newsletter','PagesController@newsletter');
	Route::get('resorts','PagesController@resorts');
	Route::get('resorts/{resort}','PagesController@resortShow');
	Route::get('resorts/{resort}/'.Lang::get('routes.accommodations'),'PagesController@resortShowAccommodations');
	Route::get('resorts/{resort}/'.Lang::get('routes.dining'),'PagesController@resortShowDining');
	Route::get('resorts/{resort}/'.Lang::get('routes.activities'),'PagesController@resortShowActivities');

	Route::get(Lang::get('routes.destinations'),'PagesController@destinations');
	Route::get(Lang::get('routes.destinations').'/{destination}','PagesController@destinationShow');
	Route::get(Lang::get('routes.experiences'),'PagesController@experiences');
	Route::get(Lang::get('routes.experiences').'/{experience}'  ,'PagesController@experienceShow');
	Route::get(Lang::get('routes.all-inclusive'),'PagesController@allInclusive');
	Route::get(Lang::get('routes.offers'),'PagesController@offers');
	Route::get(Lang::get('routes.offers').'/'.Lang::get('routes.destinations').'/{destination}','PagesController@offersDestination');
	Route::get(Lang::get('routes.offers').'/'.Lang::get('routes.resorts').'/{resort}','PagesController@offersResort');
	Route::get(Lang::get('routes.offers').'/{offer}' ,'PagesController@offerShow');
	Route::get(Lang::get('routes.packages').'/{package}' ,'PagesController@packageShow');
	Route::get(Lang::get('routes.contact'),'PagesController@contact');
	Route::get(Lang::get('routes.cookies-policy'),'PagesController@policyShow');
	Route::get(Lang::get('routes.gds'),'PagesController@gdsShow');
	Route::get(Lang::get('routes.bestDeal'),'PagesController@bestDealShow');
	Route::get(Lang::get('routes.whyBook'),'PagesController@whyBookShow');
	Route::get(Lang::get('routes.hotelPolicies'),'PagesController@hotelPoliciesShow');
	Route::get(Lang::get('routes.webcams'),'PagesController@webcamsShow');
	Route::get('newsletter/bonnier/st-maarten-deal','PagesController@newsletterBonnier');

	Route::get('test/{offer}','PagesController@test');



});