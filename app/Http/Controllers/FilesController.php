<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\DigitalDoc;
use App\DependentsInfo;
use \Log;
use \Auth;
use \View;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Session;

class FilesController extends Controller
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
    public function listDigitalDocs()
    {
   		$user = Auth::user();
   		$user_id = $user->id;

   		$digitalDocs = DigitalDoc::where('user_id', $user_id)->get();
   		Log::info('Retrieved digitalDocs for user id: '.$user_id. ', With Count:'. count($digitalDocs));
   		
   		return View::make('ListDigitalDocs')
   			->with('digitalDocs', $digitalDocs)
   			->with('statusMsg', '');
    }

    /**
     *
     */
    public function showAddDigitalDocs()
    {
    	$user = Auth::user();
   		$user_id = $user->id;

   		// Prepare Depedents Data
      	$dependents = DependentsInfo::where('user_id', $user_id)->orderBy('first_name', 'asc')->get();
      	$dependents_data = ['' => ''];
      	foreach ($dependents as $dependent) {
        	$dep_name = $dependent->first_name . ' ' . $dependent->last_name;
        	$dependents_data = $dependents_data + [$dependent->id => $dep_name];
      	}

    	return View::make('AddDigitalDocs')
   			->with('dependents', $dependents_data);
    }


    public function addDigitalDoc()
    {
    	$user = Auth::user();
   		$user_id = $user->id;

   		$input = Input::all(); 
      	Log::info('Input Data to save Digital Doc:'. print_r($input, true));

      	// getting all of the post data
		$file = array('file' => Input::file('file_data'));
		// setting up rules
		$rules = array('file' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
		// doing the validation, passing post data, rules and the messages
		$validator = Validator::make($file, $rules);
		if ($validator->fails()) {
		    // send back to the page with the input data and errors
		    return Redirect::to('addDigitalDoc')->withInput()->withErrors($validator);
		} else {

			// checking file is valid.
    		if (Input::file('file_data')->isValid()) {

    			$fileName = Input::file('file_data')->getClientOriginalName();
				$fileSize = Input::file('file_data')->getSize();
				$mimeType = Input::file('file_data')->getMimeType();

				$digitalDoc = new DigitalDoc;
				$digitalDoc->user_id = $user_id;
				$digitalDoc->file_name = $fileName;
				$digitalDoc->mime_type = $mimeType;
				$digitalDoc->file_size = $fileSize;

				$data = file_get_contents(Input::file('file_data')->getRealPath());
				$digitalDoc->file_contents = $data;
				$digitalDoc->for_dependents = $input['for_dependents'];
			    if (isset($input['dependents'])) {
			        $digitalDoc->dependent_id = $input['dependents'];  
			    }

			    $digitalDoc->save();
    		}
		}

   		$digitalDocs = DigitalDoc::where('user_id', $user_id)->get();
   		Log::info('Retrieved digitalDocs for user id: '.$user_id. ', With Count:'. count($digitalDocs));
   		
   		return View::make('ListDigitalDocs')
   			->with('digitalDocs', $digitalDocs)
   			->with('statusMsg', 'Document Saved Successfully!');
    }


    public function deleteDigitalDocs() {
      $user_id = Auth::user()->id;
      $input = Input::all(); 
      $digitalDocs = $input['digitalDocs_grp'];

      $statusMsg = 'One or more Documents deleted successfully!';

      foreach ($digitalDocs as $digitalDocId) {
        try {
            DigitalDoc::destroy($digitalDocId);
        } catch (Exception $e) {
            $statusMsg = 'Unable to delete one or more document(s)!';
            Log::error($e);
        }
      }
      
      // CODE TO RETRIEVE VISA INFORMATIOn

      $digitalDocs = DigitalDoc::where('user_id', $user_id)->get();
   		Log::info('Retrieved digitalDocs for user id: '.$user_id. ', With Count:'. count($digitalDocs));
   		
   		return View::make('ListDigitalDocs')
   			->with('digitalDocs', $digitalDocs)
   			->with('statusMsg', $statusMsg);
    }
}
