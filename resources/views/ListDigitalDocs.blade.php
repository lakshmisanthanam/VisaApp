@extends('layouts.app')

{!! Html::style( asset('css/DependentsInfo.css') ) !!}
{!! Html::script( asset('js/framework/jquery-1.12.2.min.js') ) !!}
{!! Html::script( asset('js/DigitalDocs.js') ) !!}

@section('content')

	<div class="form-data-div">
                    @if (count($digitalDocs) == 0)
                        <div class="warn-msg">There are no digital documents for you!</div><br><div>Click here to add Digital Doc:<a href="{{ url('/addDigitalDoc') }}" class="new-link">Add Document</a></div>

                    @else
						
						<form class="visa-form" role="form" method="POST" action="{{ url('/deleteDigitalDocs') }}">
                    		{!! csrf_field() !!}
                    		
                    		<button type="submit" class="button button-select button-select-float">
                                <i class="fa fa-btn fa-user"></i>Delete Selected
                            </button>
                            <a href="{{ url('/addDigitalDoc') }}" class="button button-select button-select-float">Add Document</a>
	                    	<div class="deps-row">
	                			<div class="deps-row-value depsCkbox"><input type="checkbox" name="visas_All" id="selectall" value="All"> Select All</div>
	                			<div class="deps-row-value depsHeader">File Name</div>
	                			<div class="deps-row-value depsHeader">MIME Type</div>
	                			<div class="deps-row-value depsHeader">File Size</div>
	                			<div class="deps-row-value depsHeader">Uploaded On</div>
	                			<div class="deps-row-value depsHeader">Uploaded For</div>
	                		</div>

	                		@foreach ($digitalDocs as $digitalDoc)
	                    		<div class="deps-row">
	                    			<div class="deps-row-value depsCkbox">
	                    				{!! Form::checkbox('digitalDocs_grp[]', $digitalDoc -> id, null, array('class' => 'dep-checkbox')) !!}
	                    			</div>
	                    			<div class="deps-row-value">{{ $digitalDoc-> file_name }}</div>
	                    			<div class="deps-row-value">{{ $digitalDoc-> mime_type }}</div>
	                    			<div class="deps-row-value">{{ $digitalDoc-> file_size }}</div>
	                    			<div class="deps-row-value">{{ $digitalDoc-> updated_at }}</div>
	                    			@if ($digitalDoc -> for_dependents == 'Dependents')
	                    				<div class="deps-row-value">{{ $digitalDoc-> getDependent -> first_name . ' ' . $digitalDoc-> getDependent -> last_name}}</div>
	                    			@else 
	                    				<div class="deps-row-value">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</div>
	                    			@endif
	                    		</div>
	                    	@endforeach
	                    	
	                    	<br/>
	                    	
                    </form>
                    @endif

@endsection