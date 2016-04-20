<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\VisaInfo;
use App\Relationship;
use App\DependentsInfo;
use App\Countries;
use App\VisaCategory;

use Log;
use Auth;
use View;


class VisaInfoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function visaInfo()
    {
   		$user = Auth::user();
   		$user_id = $user->id;
   		$visaInfos = VisaInfo::where('user_id', $user_id)->get();
   		Log::info('Retrieved Visa Info for user id: '.$user_id. ', With Data:'.print_r($visaInfos, true));
   		
   		return View::make('VisaInfo')->with('visaInfos', $visaInfos);
    }

    public function showAddVisaInfo()
    {
      $user_id = Auth::user()->id;
      $countries = ['' => ''] + Countries::lists('description', 'country_code')->toArray();

      // Prepare Depedents Data
      $dependents = DependentsInfo::where('user_id', $user_id)->orderBy('first_name', 'asc')->get();
      $dependents_data = ['' => ''];
      foreach ($dependents as $dependent) {
        $dep_name = $dependent->first_name . ' ' . $dependent->last_name;
        $dependents_data = $dependents_data + [$dependent->id => $dep_name];
      }

      $visa_categories = ['' => ''] + VisaCategory::lists('visa_category_code', 'visa_category_code')->toArray();

      return View::make('AddVisaInfo')
        ->with('countries', $countries)
        ->with('dependents', $dependents_data)
        ->with('visa_categories', $visa_categories);
    }
}
