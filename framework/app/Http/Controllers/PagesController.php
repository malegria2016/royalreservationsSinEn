<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Agent;
use View;
use App\Lang;
use App\CompanyPage;
use App\Offer;
use App\Website;
use App\Resort;
use App\Destination;
use App\Experience;
use App\Package;
use Carbon\Carbon;
use App\GeneralPageContents;
use App\GeneralPageWebsite;

use DB;

use Illuminate\Http\Request;

class PagesController extends Controller{

	protected $lang;
	protected $lang_id;
	protected $company_id;
	protected $website_id;
	protected $phones_mex;
	protected $phones_car;


	public function __construct(){
		$this->company_id = 1;
		$this->website_id = 11;

		date_default_timezone_set('America/Mexico_City');

		$resorts_routes_mex = Resort::mexico()->active()->select('identifier','name','ihotelier_id','area')->orderBy('id','desc')->get();
		$resorts_routes_car = Resort::caribbean()->active()->select('identifier','name','ihotelier_id','area')->get();
		$destinations_routes_mex = Destination::mexico()->active()->select('identifier','name')->get();
		$destinations_routes_car = Destination::caribbean()->active()->select('identifier','name')->get();
		$experiences_routes_en = Experience::active()->with(['contents' => function($query){$query->where('lang_id', '=', 1);}])->get();
		$experiences_routes_es = Experience::active()->with(['contents' => function($query){$query->where('lang_id', '=', 2);}])->get();
		
		$this->phones_mex = [
			"Toll Free US"=>"1-888-963-7650",
			"INTERNATIONAL"=>"1-954-736-5841",
			"Lada MX"=>"01-800-888-7744",
			"Argentina"=>"0-800-222-4419",
			"Colombia"=>"01-800-710-2067"
			];
		$this->phones_car = [
			"Toll Free US"=>"1-888-228-7930",
			"INTERNATIONAL"=>"1-954-736-5863",
			"France Toll Free"=>"0-805-080751",
			"Netherlands Toll Free"=>"0-800-022-2348",
			"UK Toll Free"=>"0-800-048-8533"
		];
		$this->phones_customer = [
			"Toll Free US"=>"1-888-721-4420",
			"Lada MX"=>"01-800-020-1761",
			"INTERNATIONAL"=>"(+52) 998-848-8226"
		];
		$this->phones_customer_residences = [
			"Toll Free US"=>"1-888-387-4763",
			"Lada MX"=>"01-800-888-1419",
			"INTERNATIONAL"=>"1-954-736-5830",
			"LOCAL"=>"998-881-0124"
		];
		$this->phone_skype_mex = "skype:rrg.mexico1?call";
		$this->phone_skype_car = "skype:rrg.caribbean?call";
		View::share('resorts_routes_mex',$resorts_routes_mex);
		View::share('resorts_routes_car',$resorts_routes_car);
		View::share('destinations_routes_mex',$destinations_routes_mex);
		View::share('destinations_routes_car',$destinations_routes_car);
		View::share('experiences_routes_en',$experiences_routes_en);
		View::share('experiences_routes_es',$experiences_routes_es);
	}
	public function home(){
		App::setLocale('en');
		$this->lang_id=1;
		$home_identifier = 'rr-home';

		$page = CompanyPage::company($this->company_id)->active()->identifier($home_identifier)
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->first();
		if($page){
			$page = $page->contents->first();
		}
		if(Agent::isMobile()){
			$offers = Offer::active()->range()
				->whereHas('websites', function($q){ $q->where('id', $this->website_id);})
				->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
				->where('main', '1')->orderBy('priority','desc')
				->take(3)->get();
		}
		else{
			$offers = Offer::active()->range()
				->whereHas('websites', function($q){ $q->where('id',$this->website_id);})
				->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
				->where('mobile_only',0)->where('main', '1')->orderBy('priority','desc')
				->take(3)->get();
		}
		
		View::share('phones_customer',$this->phones_customer);
		View::share('phones_mex',$this->phones_mex);
		View::share('phones_car',$this->phones_car);
		View::share('phone_skype',$this->phone_skype_mex);
		
		return View('pages.home',compact('page','offers','destination'));
	}
	public function inicio(){
		App::setLocale('es');
		$this->lang_id=2;
		$home_identifier = 'rr-home';
		$page = CompanyPage::company($this->company_id)->active()->identifier($home_identifier)
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->first();
		if($page){
			$page = $page->contents->first();
		}
		
		if(Agent::isMobile()){
			$offers = Offer::active()->range()
				->whereHas('websites', function($q){ $q->where('id',$this->website_id);})
				->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
				->where('main', '1')->orderBy('priority','desc')
				->take(3)->get();
		}
		else{
			$offers = Offer::active()->range()
				->whereHas('websites', function($q){ $q->where('id',$this->website_id);})
				->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
				->where('mobile_only',0)->where('main', '1')->orderBy('priority','desc')
				->take(3)->get();
		}

		View::share('phones_customer',$this->phones_customer);
		View::share('phones_mex',$this->phones_mex);
		View::share('phones_car',$this->phones_car);
		View::share('phone_skype',$this->phone_skype_mex);
		
		return View('pages.home',compact('page','offers','destination'));
	}

	public function resorts(){
		$resorts_identifier = 'rr-resorts';
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }
		$page = CompanyPage::company($this->company_id)->active()->identifier($resorts_identifier)
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->first();
		if($page){
			$page = $page->contents->first();
		}
		$resorts_mex = Resort::mexico()->active()->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->get();
		$resorts_car = Resort::caribbean()->active()->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->get();

		View::share('phones_customer',$this->phones_customer);
		View::share('phones_mex',$this->phones_mex);
		View::share('phones_car',$this->phones_car);
		View::share('phone_skype',$this->phone_skype_mex);

		return view('pages.resorts',compact('page','resorts_mex','resorts_car'));
	}

	public function resortShow($resort){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }

		$resort = Resort::identifier($resort)->active()
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
		->with(['accommodations.contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
		->with(['dinings.contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
		->with(['activities.contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
		->first();

		if($resort){
			if ($resort->location == "Mexican Caribbean") {
				if ($resort->identifier == 'grand-residences') {
					View::share('phones_customer',$this->phones_customer_residences);
				}else {
					View::share('phones_customer',$this->phones_customer);
				}
				View::share('phones_mex',$this->phones_mex);
				View::share('phone_skype',$this->phone_skype_mex);
			}else {
				View::share('phones_customer',$this->phones_customer);
				View::share('phones_car',$this->phones_car);
				View::share('phone_skype',$this->phone_skype_car);
			}

			return view('pages.resort', compact('resort','package') );
		}else{
			abort(404);
		}
		
	}

	public function destinations(){
		$page_destinations_identifier = 'rr-destinations';
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }

		$page = CompanyPage::company($this->company_id)->active()->identifier($page_destinations_identifier)
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->first();

		if($page){ $page = $page->contents->first(); }

		$destinations_mex = Destination::mexico()->active()
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->get();

		$destinations_car = Destination::caribbean()->active()
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->get();

		//return dd($destinations_car->toArray());
		View::share('phones_customer',$this->phones_customer);
		View::share('phones_mex',$this->phones_mex);
		View::share('phones_car',$this->phones_car);
		View::share('phone_skype',$this->phone_skype_mex);
		return view('pages.destinations',compact('page','destinations_mex','destinations_car'));
	}

	public function destinationShow($destination){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }

		$destination = Destination::active()->identifier($destination)
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
		->first();
		if($destination){
			$resorts = Resort::active()->whereHas('destinations', function($q) use ($destination){
					$q->where('id', $destination->id);
				})->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->get();
				if ($destination->location == "Mexican Caribbean") {
					View::share('phones_mex',$this->phones_mex);
					View::share('phone_skype',$this->phone_skype_mex);
				}else {
					View::share('phones_car',$this->phones_car);
					View::share('phone_skype',$this->phone_skype_car);
				}
				View::share('phones_customer',$this->phones_customer);
				$experiences_routes = Experience::active()->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->get();
			return View('pages.destination', compact('destination','resorts','experiences_routes'));
		}else{
			abort(404);
		}
	}

	public function experiences(){
		$page_experiences_identifier = 'rr-experiences';
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }

		$page = CompanyPage::company($this->company_id)->active()->identifier($page_experiences_identifier)
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->first();
		
		if($page){
			$page = $page->contents->first();

			$experiences = Experience::active()
			->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->get();

			View::share('phones_customer',$this->phones_customer);
			View::share('phones_mex',$this->phones_mex);
			View::share('phones_car',$this->phones_car);
			View::share('phone_skype',$this->phone_skype_mex);

			//return dd($experiences);
			return View('pages.experiences', compact('page','experiences'));
		}
	}

	public function experienceShow($experience){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }
		$experience = Experience::active()->identifier($experience)
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
		->first();
		if($experience){
			$resorts = Resort::active()->whereHas('experiences', function($q) use ($experience){
					$q->where('id', $experience->id);
				})->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->get();
			//return dd($resorts->toArray());
			$experiences_routes = Experience::active()->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->get();
			View::share('phones_customer',$this->phones_customer);
			View::share('phones_mex',$this->phones_mex);
			View::share('phones_car',$this->phones_car);
			View::share('phone_skype',$this->phone_skype_mex);
			return View('pages.experience', compact('experience','resorts','experiences_routes')) ;
		}else{
			abort(404);
		}
	}

	public function allInclusive(){
		$page_all_inclusive_identifier = "rr-all-inclusive";
		
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }

		$page = CompanyPage::company($this->company_id)->active()->identifier($page_all_inclusive_identifier)
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->first();
		
		if($page){ $page = $page->contents->first();}

		$resorts = Resort::active()->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->where('plan','!=','EP')->get();
		
		//return dd($page);
		View::share('phones_customer',$this->phones_customer);
		View::share('phones_mex',$this->phones_mex);
		View::share('phone_skype',$this->phone_skype_mex);
		return View('pages.all-inclusive',compact('page','resorts'));
	}

	public function offers(){
		$page_offers_identifier = "rr-offers";
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }

		$page = CompanyPage::company($this->company_id)->active()->identifier($page_offers_identifier)
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->first();
		
		if($page){$page = $page->contents->first();}
		
		if(Agent::isMobile()){
			$offers = Offer::active()->range()
				->whereHas('websites', function($q){ $q->where('id', $this->website_id);})
				->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
				->where('main', '1')->orderBy('priority','desc')
				->get();
		}
		else{
			$offers = Offer::active()->range()
				->whereHas('websites', function($q){ $q->where('id', $this->website_id);})
				->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
				->where('mobile_only',0)->where('main', '1')->orderBy('priority','desc')
				->get();
		}

		$packages = Package::active()->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
		->orderBy('priority','desc')->get();
		
		//return dd($offers->toArray());
		View::share('phones_customer',$this->phones_customer);
		View::share('phones_mex',$this->phones_mex);
		View::share('phones_car',$this->phones_car);
		View::share('phone_skype',$this->phone_skype_mex);
		return View("pages.offers", compact("page","offers","packages"));
	}

	public function offersDestination($destination){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }

		$destination = Destination::active()->identifier($destination)
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
		->first();
		$resorts_id = array();
		if($destination){
			$resorts = Resort::active()
					 ->whereHas('destinations', function($q) use ($destination){$q->where('id', $destination->id);})
					 ->get();
			foreach($resorts as $resort){
				array_push($resorts_id, $resort->id);
			}
			if(Agent::isMobile()){
				$offers = Offer::active()->range()
					->whereHas('resorts', function($q) use ($resorts_id){$q->whereIn('id', $resorts_id);})
					->whereHas('websites', function($q){ $q->where('id', $this->website_id);})
					->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
					->where('main', '1')->orderBy('priority','desc')
					->get();
			}
			else{
				$offers = Offer::active()->range()
					->whereHas('resorts', function($q) use ($resorts_id){$q->whereIn('id', $resorts_id);})
					->whereHas('websites', function($q){ $q->where('id', $this->website_id);})
					->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
					->where('mobile_only',0)->where('main', '1')->orderBy('priority','desc')
					->get();
			}

			//return dd($offers);
			if ($destination->location == "Mexican Caribbean") {
				View::share('phones_mex',$this->phones_mex);
				View::share('phone_skype',$this->phone_skype_mex);
			}else {
				View::share('phones_car',$this->phones_car);
				View::share('phone_skype',$this->phone_skype_car);
			}
			View::share('phones_customer',$this->phones_customer);
			$package = Package::active()->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
			->orderBy('priority','desc')->first();
			
			return View("pages.offers-destination",compact('destination','offers','package'));
		}else{
			abort(404);
		}
	}

	public function offersResort($resort){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }
		$resort = Resort::identifier($resort)->active()
				->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->first();

		if($resort){
		
			if(Agent::isMobile()){
				$offers = Offer::active()->range()
					->whereHas('resorts', function($q) use ($resort){$q->where('id', $resort->id);})
					->whereHas('websites', function($q){ $q->where('id',$this->website_id);})
					->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
					->where('main', '1')->orderBy('priority','desc')
					->get();
			}
			else{
				$offers = Offer::active()->range()
					->whereHas('resorts', function($q) use ($resort){$q->where('id', $resort->id);})
					->whereHas('websites', function($q){ $q->where('id',$this->website_id);})
					->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
					->where('mobile_only',0)->where('main', '1')->orderBy('priority','desc')
					->get();
			}
			if ($resort->location == "Mexican Caribbean") {
				View::share('phones_mex',$this->phones_mex);
				View::share('phone_skype',$this->phone_skype_mex);
				if ($resort->identifier == 'grand-residences') { 
					View::share('phones_customer',$this->phones_customer_residences);
				}else {
					View::share('phones_customer',$this->phones_customer);
				}
			}else {
				View::share('phones_customer',$this->phones_customer);
				View::share('phones_car',$this->phones_car);
				View::share('phone_skype',$this->phone_skype_car);
			}
			
			$package = Package::active()->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
			->orderBy('priority','desc')->first();
			
			return view('pages.offers-resort', compact('resort','offers','package') );
		}else{
			abort(404);
		}
	}

	public function offerShow($offer){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }

		if(Agent::isMobile()){
			$offer = Offer::active()->identifier($offer)
				->whereHas('websites', function($q){ $q->where('id',$this->website_id);})
				->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
				->where('main', '1')->first();
		}
		else{
			$offer = Offer::active()->identifier($offer)
				->whereHas('websites', function($q){ $q->where('id',$this->website_id);})
				->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
				->where('mobile_only',0)->where('main', '1')->first();	
		}
		if($offer){
			$travel_window = App\OfferTravelWindow::where('offer_id',$offer->id)->orderBy('start_date','asc')->get();

			$resorts = Resort::active()->whereHas('offers', function($q) use ($offer){
					$q->where('id', $offer->id);
				})->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->get();

			$offer_resort = App\OfferResort::where('offer_id',$offer->id)->get();
			//return dd($offer_resort);

			$i=0; 
			foreach ($resorts as $key => $value) {
				//offer_resort2 almacena los datos necesarios en un solo vector para llevar al formulario.
				for($k=0; $k<count($offer_resort); $k++){
					if($value->id==$offer_resort[$k]['resort_id']){
						$offer_resort2[$i]['ihotelier_rate_id']=$offer_resort[$k]['ihotelier_rate_id'];
						$offer_resort2[$i]['minimum']=$offer_resort[$k]['minimum'];
						$offer_resort2[$i]['id']=$value->id;
						$offer_resort2[$i]['name']=$value->name;
						$offer_resort2[$i]['ihotelier_id']=$value->ihotelier_id;
						$offer_resort2[$i]['area']=$value->area;
					}
				}
				if($value->location == 'Mexican Caribbean'){
					View::share('phones_mex',$this->phones_mex);
					View::share('phone_skype',$this->phone_skype_mex);
				}else if ($value->location == 'Caribbean Islands') {
					View::share('phones_car',$this->phones_car);
					View::share('phone_skype',$this->phone_skype_car);
				}
				$i++;
			}

			$all_offers = Offer::active()->range()
						->whereHas('resorts', function($q) use ($resorts){$q->where('id', $resorts[0]->id);})
						->whereHas('contents', function($q){$q->where('lang_id', $this->lang_id);})
						->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
						->where('mobile_only',0)->where('main',1)->orderBy('priority','desc')->get();
						//return dd($all_offers->toArray());

			$et_time=date('H:i:s');

			View::share('phones_customer',$this->phones_customer);

			return View('pages.offer-v2 ', compact('offer','resorts','all_offers','offer_resort2','travel_window','et_time'));
		}else{
			abort(404);
		}
	}
	public function packageShow($package){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }
		$package = Package::active()->identifier($package)
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])->first();
		//return dd($package->toArray());
		if($package){
			$packages = Package::active()->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
			->where('id','!=',$package->id)->orderBy('priority','desc')->get();

			View::share('phones_customer',$this->phones_customer);
			View::share('phones_mex',$this->phones_mex);
			View::share('phone_skype',$this->phone_skype_mex);
			return View('pages.package', compact('package','packages')) ;
		}else{
			abort(404);
		}
	}
	public function contact(){
		View::share('phones_customer',$this->phones_customer);
		View::share('phone_skype',$this->phone_skype_mex);
		return View("pages.contact");
	}
	public function policyShow(){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }
		$policies = App\Resort_policy::general()->where('lang_id', '=', $this->lang_id)->where('resort_id','100')->get();		     
		View::share('phones_customer',$this->phones_customer);
		View::share('phone_skype',$this->phone_skype_mex);

		return View("pages.privacy-policy", compact('policies'));
	}
	public function newsletter(){
		/*$offers= DB::table('offers')
				->join('offer_resort','offers.id','=','offer_resort.offer_id')
				->join('offer_contents','offers.id','=','offer_contents.id')
				->get();

		$fechas= DB::table('offers')
				->whereBetween('start_date', ['2016-08-01','2016-08-18'])
				->get();
		*/
		//$offers = DB::table('offers')->skip(10)->take(5)->get();				
		//$offers = DB::table('offers')->max('end_date');
		//$offers = DB::table('offers')->avg('end_date');

		//$offers = DB::table('offers')->where('start_date','>','2016-07-01')->value('name','identifier');				

		//$offers = App\Offer::where('id', '>', 100)->firstOrFail();

		//return dd($offers);

		View::share('phones_customer',$this->phones_customer);
		View::share('phone_skype',$this->phone_skype_mex);
		return View("pages.newsletter");
	}

	public function gdsShow(){
		$resortGds = App\Resort_gds::all();
		$rateplan = App\Rateplan_gds::all();

		View::share('phones_customer',$this->phones_customer);
		View::share('phone_skype',$this->phone_skype_mex);
		//return dd($resortGds->toArray());
		return View("pages.gds-promos2016", compact('resortGds', 'rateplan'));
	}
	public function webcamsShow(){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }
		$resorts = App\Resort::whereNotIn('id', [6,7,8,9])->get();
		$policies = App\Resort_policy::general()->where('lang_id', '=', $this->lang_id)->where('resort_id','104')->get();	
		View::share('phones_customer',$this->phones_customer);
		View::share('phone_skype',$this->phone_skype_mex);

		return View("pages.webcams", compact('resorts','policies'));
	}
	public function newsletterBonnier(){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }

		/* consulto las promos vigentes del hotel para mostrarlas como opciones si la promo está no vigente */
		$all_offers = Offer::active()->range()
					->whereHas('resorts', function($q){$q->where('id','7');})
					->with(['websites' => function($q) { $q->where('id', '11');}])
					->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
					->where('mobile_only',0)->where('main',1)->orderBy('priority','desc')->get();

		View::share('phones_customer',$this->phones_customer);
		View::share('phone_skype',$this->phone_skype_mex);
		return View("pages.offer-v3", compact('all_offers'));
	}
	public function bestDealShow(){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }
		$policies = App\Resort_policy::general()->where('lang_id', '=', $this->lang_id)->where('resort_id','101')->get();		
               
		View::share('phones_customer',$this->phones_customer);
		View::share('phone_skype',$this->phone_skype_mex);
		return View("pages.best-deal", compact('policies'));
	}	
	public function whyBookShow(){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }
		$policies = App\Resort_policy::general()->where('lang_id', '=', $this->lang_id)->where('resort_id','102')->get();		
               
		View::share('phones_customer',$this->phones_customer);
		View::share('phone_skype',$this->phone_skype_mex);

		return View("pages.why-book", compact('policies'));
	}
	public function hotelPoliciesShow(){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }
		$policies = App\Resort_policy::general()->where('lang_id', '=', $this->lang_id)->where('resort_id','103')->get();		
               
		View::share('phones_customer',$this->phones_customer);
		View::share('phone_skype',$this->phone_skype_mex);
		return View("pages.hotel-policies", compact('policies'));
	}
	public function resortShowAccommodations($resort){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }

		$resort = Resort::identifier($resort)->active()
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
		->with(['accommodations.contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
		->with(['accommodations'=>function($query){$query->orderBy('price','asc');}])
		->first();

		if($resort){
			if ($resort->location == "Mexican Caribbean") {
				if ($resort->identifier == 'grand-residences') {
					View::share('phones_customer',$this->phones_customer_residences);
				}else {
					View::share('phones_customer',$this->phones_customer);
				}
				View::share('phones_mex',$this->phones_mex);
				View::share('phone_skype',$this->phone_skype_mex);
			}else {
				View::share('phones_customer',$this->phones_customer);
				View::share('phones_car',$this->phones_car);
				View::share('phone_skype',$this->phone_skype_car);
			}
			//return dd($resort);
			return view('pages.accommodation', compact('resort') );
		}else{
			abort(404);
		}
	}
	public function resortShowDining($resort){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }

		$resort = Resort::identifier($resort)->active()
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
		->with(['dinings.contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
		->first();

		if($resort){
			if ($resort->location == "Mexican Caribbean") {
				if ($resort->identifier == 'grand-residences') {
					View::share('phones_customer',$this->phones_customer_residences);
				}else {
					View::share('phones_customer',$this->phones_customer);
				}
				View::share('phones_mex',$this->phones_mex);
				View::share('phone_skype',$this->phone_skype_mex);
			}else {
				View::share('phones_customer',$this->phones_customer);
				View::share('phones_car',$this->phones_car);
				View::share('phone_skype',$this->phone_skype_car);
			}
			return view('pages.dining', compact('resort') );
		}else{
			abort(404);
		}
	}
	public function resortShowActivities($resort){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }

		$resort = Resort::identifier($resort)->active()
		->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
		->with(['activities.contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
		->first();

		if($resort){
			if ($resort->location == "Mexican Caribbean") {
				if ($resort->identifier == 'grand-residences') {
					View::share('phones_customer',$this->phones_customer_residences);
				}else {
					View::share('phones_customer',$this->phones_customer);
				}
				View::share('phones_mex',$this->phones_mex);
				View::share('phone_skype',$this->phone_skype_mex);
			}else {
				View::share('phones_customer',$this->phones_customer);
				View::share('phones_car',$this->phones_car);
				View::share('phone_skype',$this->phone_skype_car);
			}
			return view('pages.activities', compact('resort') );
		}else{
			abort(404);
		}
		
	}
	public function buenFinAI(){
		if(App::getLocale()=='es'){ 
			$this->lang_id=1; 
			/* consulto las promos vigentes del hotel para mostrarlas como opciones si la promo está no vigente */
			$all_offers = Offer::active()->range()
						->whereHas('resorts', function($q){$q->whereIn('id',[1,4,5]);})
						->with(['websites' => function($q) { $q->where('id', '11');}])
						->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
						->where('mobile_only',0)->where('main',1)->orderBy('priority','desc')->get();

			View::share('phones_customer',$this->phones_customer);
			View::share('phone_skype',$this->phone_skype_mex);
			return View("pages.offer-buenfin16-ai", compact('all_offers'));
		}
		else{
			abort(404);	
		} 
	}
	public function buenFinEP(){
		if(App::getLocale()=='es'){ 
			$this->lang_id=1; 
			/* consulto las promos vigentes del hotel para mostrarlas como opciones si la promo está no vigente */
			$all_offers = Offer::active()->range()
						->whereHas('resorts', function($q){$q->whereIn('id',[2,3]);})
						->with(['websites' => function($q) { $q->where('id', '11');}])
						->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
						->where('mobile_only',0)->where('main',1)->orderBy('priority','desc')->get();

			View::share('phones_customer',$this->phones_customer);
			View::share('phone_skype',$this->phone_skype_mex);
			return View("pages.offer-buenfin16-ep", compact('all_offers'));
		}
		else{
			abort(404);	
		}
	}
	public function buenFinGRM(){
		if(App::getLocale()=='es'){ 
			$this->lang_id=1; 
			/* consulto las promos vigentes del hotel para mostrarlas como opciones si la promo está no vigente */
			$all_offers = Offer::active()->range()
						->whereHas('resorts', function($q){$q->whereIn('id',[6]);})
						->with(['websites' => function($q) { $q->where('id', '11');}])
						->with(['contents' => function($query){$query->where('lang_id', '=', $this->lang_id);}])
						->where('mobile_only',0)->where('main',1)->orderBy('priority','desc')->get();

			View::share('phones_customer',$this->phones_customer);
			View::share('phone_skype',$this->phone_skype_mex);
			return View("pages.offer-buenfin16-grm", compact('all_offers'));
		} 
		else{
			abort(404);	
		}
	}
	public function generalPages($page){
		if(App::getLocale()=='en'){ $this->lang_id=1; } else{ $this->lang_id=2; }
		$page = GeneralPageContents::active()->identifier($page)->first();
		if($page){
			View::share('phones_customer',$this->phones_customer);
			View::share('phones_mex',$this->phones_mex);
			View::share('phone_skype',$this->phone_skype_mex);
			return View('pages.general-page',compact('page'));
		}
		else{
			abort(404);
		}
	}

	public function travelTips(){
		
		View::share('phones_customer',$this->phones_customer);
		View::share('phones_mex',$this->phones_mex);
		View::share('phone_skype',$this->phone_skype_mex);
		return View('emailblast.traveltips');
		
	}

}
