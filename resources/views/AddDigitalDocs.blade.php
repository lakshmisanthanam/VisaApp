@extends('layouts.app')

{!! Html::script( asset('js/framework/jquery-1.12.2.min.js') ) !!}
{!! Html::script( asset('js/framework/jquery-ui.min.js') ) !!}
{!! Html::script( asset('js/AddDigitalDocs.js') ) !!}
{!! Html::style( asset('css/framework/jquery-ui.css') ) !!}

@section('content')
	
	<div class="form-data-div">
        <!-- <form class="visa-form" role="form" method="POST" action="{{ url('/addDigitalDoc') }}"> -->
        {!! Form::open(array('url'=>'/addDigitalDoc','method'=>'POST', 'files'=>true, 'class' => 'visa-form')) !!}
            {!! csrf_field() !!}
			<h2>Add Document</h2>
			
            <div class="form-group{{ $errors->has('doc_type') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Select Document</label>

                <div class="col-md-6">
                    {!! Form::file('file_data') !!}

                    @if ($errors->has('file'))
                        <span class="help-block">
                            <strong>{{ $errors->first('file') }}</strong>
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
                        <i class="fa fa-btn fa-user"></i>Add Document
                    </button>
                </div>
            </div>
        <!-- </form> -->
        {!! Form::close() !!}
    </div>

@endsection