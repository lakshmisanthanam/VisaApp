@extends('layouts.app')


{!! Html::script( asset('js/framework/jquery-1.12.2.min.js') ) !!}
{!! Html::script( asset('js/framework/jquery-ui.min.js') ) !!}
{!! Html::script( asset('js/DependentsInfo.js') ) !!}
{!! Html::style( asset('css/framework/jquery-ui.css') ) !!}

@section('content')
	<div class="form-data-div">
                    <form class="visa-form" role="form" method="POST" action="{{ url('/dependents/edit/save') }}">
                    	<h2>Edit Dependent</h2>
                        {!! csrf_field() !!}

                        <input type="hidden" name="id" value="{{ $dependent->id }}" >

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">First Name</label>
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="first_name" value="{{ $dependent->first_name }}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Last Name</label>
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last_name" value="{{ $dependent->last_name  }}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Date Of Birth</label>
                            @if ($errors->has('date_of_birth'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                                </span>
                            @endif

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="date_of_birth" value="{{ $dependent->date_of_birth }}" id="datepicker">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('relationshipType') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Relationship Type</label>
                            @if ($errors->has('relationshipType'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('relationshipType') }}</strong>
                                </span>
                            @endif

                            <div class="col-md-6">
                                {!! Form::select('relationshipType', $relationshipTypes, array($dependent->dependent_cat_id), array('class' => 'select')) !!}
                            </div>
                        </div>

                       <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="button">
                                    <i class="fa fa-btn fa-user"></i>Edit Dependent
                                </button>
                            </div>
                        </div>
                    </form>
      </div>
@endsection