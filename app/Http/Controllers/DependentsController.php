<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

use App\DependentsInfo;
use App\Relationship;

use Log;
use Auth;
use View;


class DependentsController extends Controller
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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dependentsInfo()
    {
   		$user = Auth::user();
   		$user_id = $user->id;
   		$dependents = DependentsInfo::where('user_id', $user_id)->get();
   		Log::info('Retrieved dependents for user id: '.$user_id. ', With Data:'.$dependents);
   		foreach ($dependents as $dependent) {
   			Log::info('Dependent Category:'.$dependent->relationship);
   		}
   		return View::make('DependentsInfo')->with('dependents', $dependents);
    }

    public function showAddDependent()
    {
    	$relationships = ['' => ''] + Relationship::lists('relation_description', 'relation_type')->toArray();
    	//Log::info('Returning RelationshipTypes:'.$relationships);
    	return View::make('AddDependent')->with('relationshipTypes', $relationships);
    }

    public function addDependent() {
    	$user_id = Auth::user()->id;
    	$input = Input::all(); 
    	$relationshipType = $input['relationshipType'];

    	$relationship = Relationship::where('relation_type', $relationshipType)->first();

    	$dependent = new DependentsInfo;
    	$dependent->user_id = $user_id;
    	$dependent->first_name = $input['first_name'];
    	$dependent->last_name = $input['last_name'];
    	$dependent->date_of_birth = $input['date_of_birth'];
    	$dependent->dependent_cat_id = $relationship->id;
    	$dependent->save();

    	$dependents = DependentsInfo::where('user_id', $user_id)->get();
   		Log::info('Retrieved dependents for user id: '.$user_id. ', With Data:'.$dependents);
   		foreach ($dependents as $dependent) {
   			Log::info('Dependent Category:'.$dependent->relationship);
   		}
   		return View::make('DependentsInfo')->with('dependents', $dependents);
    }

    public function deleteDependents() {
    	$user_id = Auth::user()->id;
    	$input = Input::all(); 
    	$selectedDependents = $input['dependents_grp'];

    	Log::info(print_r($input, true));
    	Log::info(print_r($selectedDependents, true));

    	foreach ($selectedDependents as $dependentId) {
    		DependentsInfo::destroy($dependentId);
    	}
    	
    	$dependents = DependentsInfo::where('user_id', $user_id)->get();
   		Log::info('Retrieved dependents for user id: '.$user_id. ', With Data:'.$dependents);
   		foreach ($dependents as $dependent) {
   			Log::info('Dependent Category:'.$dependent->relationship);
   		}
   		return View::make('DependentsInfo')->with('dependents', $dependents);
    }
}
