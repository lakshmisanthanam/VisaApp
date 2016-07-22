<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Log;
use Auth;
use View;
use App\User;
use Validator;
use Redirect;

class AccountsController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware ( 'auth' );
	}
	public function getMyAccount() {
		$user = Auth::user ();
		$id = $user->id;
		Log::info ( 'Retrieving account for User:' . $id );
		
		$user_data = User::find ( $id );
		return View::make ( 'AccountsInfo' )->with ( 'user_data', $user_data );
	}

	public function saveMyAccount() {
		$user = Auth::user ();
		$id = $user->id;
		$input = Input::all(); 

		$rules = array('first_name' => 'required',
                     'last_name' => 'required',
                     'date_of_birth' => 'required',
                     'email' => 'required');

		$validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            // send back to the page with the input data and errors
            Log::info('Redirecting due to errors');
            return Redirect::to('myAccount')->withInput()->withErrors($validator);
        } else {

			Log::info('Saving Account Information for User Id: '.$id. ', With Data:'.print_r($input, true));

			$user_data = User::find ( $id );
			$user_data->first_name = $input['first_name'];
			$user_data->last_name = $input['last_name'];
			$user_data->date_of_birth = $input['date_of_birth'];
			$user_data->email = $input['email'];
			$user_data->save();

			return View::make ( 'AccountsInfo' )->with ( 'user_data', $user_data );	
		}

		
	}
}
