<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\VisaInfo;

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
}
