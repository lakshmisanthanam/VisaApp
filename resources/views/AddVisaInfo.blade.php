@extends('layouts.app')


{!! Html::script( asset('js/framework/jquery-1.12.2.min.js') ) !!}
{!! Html::script( asset('js/framework/jquery-ui.min.js') ) !!}
{!! Html::script( asset('js/AddVisaInfo.js') ) !!}
{!! Html::style( asset('css/framework/jquery-ui.css') ) !!}
{!! Html::style( asset('css/AddVisaInfo.css') ) !!}

@section('content')
	<div class="form-data-div">
                    <form class="visa-form" role="form" method="POST" action="{{ url('/addVisaInfo') }}">
                        {!! csrf_field() !!}
						<h2>Add VISA Information</h2>
						
                        <div class="form-group{{ $errors->has('visa_country') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">VISA Country</label>

                            <div class="col-md-6">
                                {!! Form::select('visa_country', $countries, null, array('class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('visa_category') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">VISA Category</label>

                            <div class="col-md-6">
                                {!! Form::select('visa_category', $visa_categories, null, array('class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('visa_number') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">VISA Number</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="visa_number" value="{{ old('visa_number') }}">

                                @if ($errors->has('visa_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visa_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('visa_issued_date') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">VISA Issued Date</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="visa_issued_date" value="" id="visa_issued_datepicker">

                                @if ($errors->has('visa_issued_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visa_issued_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('visa_expiry_date') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">VISA Expiry Date</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="visa_expiry_date" value="" id="visa_expiry_datepicker">

                                @if ($errors->has('visa_expiry_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visa_expiry_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('place_of_issue') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Place of Issue</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="place_of_issue" value="{{ old('place_of_issue') }}">

                                @if ($errors->has('place_of_issue'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('place_of_issue') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('issued_country') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Issued Country</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="issued_country" value="{{ old('issued_country') }}">

                                @if ($errors->has('issued_country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('issued_country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('for_dependents') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Dependents or Yourself</label>

                            <div class="col-md-6" id="radioBtns">
                                <input type="radio" name="for_dependents" value="Self" checked> Self
                                <input type="radio" name="for_dependents" value="Dependents"> Dependents

                                @if ($errors->has('for_dependents'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('for_dependents') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dependents') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Dependents</label>

                            <div class="col-md-6">
                                {!! Form::select('dependents', $dependents, null, array('class' => 'form-control', 'id' => 'dependents_dropdown')) !!}
                            </div>
                        </div>

                       <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="button">
                                    <i class="fa fa-btn fa-user"></i>Add Visa Info
                                </button>
                            </div>
                        </div>
                    </form>
    </div>
@endsection