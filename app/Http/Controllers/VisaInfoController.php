<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
      $countries = ['' => ''] + Countries::lists('description', 'id')->toArray();

      // Prepare Depedents Data
      $dependents = DependentsInfo::where('user_id', $user_id)->orderBy('first_name', 'asc')->get();
      $dependents_data = ['' => ''];
      foreach ($dependents as $dependent) {
        $dep_name = $dependent->first_name . ' ' . $dependent->last_name;
        $dependents_data = $dependents_data + [$dependent->id => $dep_name];
      }

      $visa_categories = ['' => ''] + VisaCategory::lists('visa_category_code', 'id')->toArray();

      return View::make('AddVisaInfo')
        ->with('countries', $countries)
        ->with('dependents', $dependents_data)
        ->with('visa_categories', $visa_categories);
    }

    public function saveVisaInfo() {
      $user = Auth::user();
      $user_id = $user->id;

      $input = Input::all(); 
      Log::info('Input Data to save Visa Info:'. print_r($input, true));

      $visaInfo = new VisaInfo;
      $visaInfo->user_id = $user_id;
      $visaInfo->visa_country_id = $input['visa_country'];
      $visaInfo->category_id = $input['visa_category'];
      $visaInfo->visa_number = $input['visa_number'];
      $visaInfo->expiry_date = $input['visa_expiry_date'];
      $visaInfo->issued_on = $input['visa_issued_date'];
      $visaInfo->place_of_issue = $input['place_of_issue'];
      $visaInfo->issued_in_country = $input['issued_country'];
      $visaInfo->for_dependents = $input['for_dependents'];
      if (isset($input['dependents'])) {
        $visaInfo->dependent_id = $input['dependents'];  
      }
      
      $visaInfo->save();

      $visaInfos = VisaInfo::where('user_id', $user_id)->get();
      Log::info('Retrieved Visa Info for user id: '.$user_id. ', With Data:'.print_r($visaInfos, true));
      
      return View::make('VisaInfo')->with('visaInfos', $visaInfos);
    }

    public function deleteVisaInfos() {
      $user_id = Auth::user()->id;
      $input = Input::all(); 
      $visaInfos = $input['visaInfos_grp'];

      $statusMsg = 'One or more Visa Informations deleted successfully!';

      foreach ($visaInfos as $visaId) {
        try {
            VisaInfo::destroy($visaId);
        } catch (Exception $e) {
            $statusMsg = 'Unable to delete few Visa Information!';
            Log::error($e);
        }
      }
      
      // CODE TO RETRIEVE VISA INFORMATIOn

      $visaInfos = VisaInfo::where('user_id', $user_id)->get();
      Log::info('Retrieved Visa Info for user id: '.$user_id. ', With Data:'.print_r($visaInfos, true));
      
      return View::make('VisaInfo')
        ->with('visaInfos', $visaInfos)
        ->with('statusMsg', $statusMsg);
    }
}
