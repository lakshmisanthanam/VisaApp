<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

use App\DependentsInfo;
use App\Relationship;

use \Exception;
use Log;
use Auth;
use View;
use Validator;
use Redirect;

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
   		return View::make('DependentsInfo')->with('dependents', $dependents)->with('statusMsg', '');
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

        $rules = array('first_name' => 'required',
                     'last_name' => 'required',
                     'date_of_birth' => 'required',
                     'relationshipType' => 'required');

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('addDependent')->withInput()->withErrors($validator);
        } else {

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
       		 
       		 return View::make('DependentsInfo')->with('dependents', $dependents)->with('statusMsg', 'Dependent Created Successfully');
        }
    }

    public function deleteDependents() {
      	$user_id = Auth::user()->id;
      	$input = Input::all(); 
        $statusMsg = '';

        if (!isset($input['dependents_grp'])) {
            $statusMsg = 'No entries were selected for deletion';
        } else {
            $selectedDependents = $input['dependents_grp'];

            Log::info(print_r($input, true));
            Log::info(print_r($selectedDependents, true));

            $statusMsg = 'One or more dependent(s) deleted successfully!';

            foreach ($selectedDependents as $dependentId) {
                try {
                    DependentsInfo::destroy($dependentId);
                } catch (Exception $e) {
                    $statusMsg = 'Unable to delete few dependents! Please check VISA & Documents for ths dependent';
                    Log::error($e);
                }
            }
        }
      	
      	
      	$dependents = DependentsInfo::where('user_id', $user_id)->get();
     		Log::info('Retrieved dependents for user id: '.$user_id. ', With Data:'.$dependents);
     		foreach ($dependents as $dependent) {
     			Log::info('Dependent Category:'.$dependent->relationship);
     		}
     		return View::make('DependentsInfo')->with('dependents', $dependents)->with('statusMsg', $statusMsg);
    }
}
