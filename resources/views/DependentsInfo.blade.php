@extends('layouts.app')


{!! Html::style( asset('css/DependentsInfo.css') ) !!}
{!! Html::script( asset('js/framework/jquery-1.12.2.min.js') ) !!}
{!! Html::script( asset('js/DependentsInfo.js') ) !!}

@section('content')
<div class="form-data-div">
                	
                    @if (count($dependents) == 0)
                    	<div class="warn-msg">There are no dependents under you!</div><br><div>Click here to add a new dependent:<a href="{{ url('/addDependent') }}" class="new-link">Add Dependent</a></div> 
                    @else
                    	@if ($statusMsg != '') 
                    		<div class="warn-msg">{{ $statusMsg }}</div>
                    	@endif
                    	<form class="visa-form" role="form" method="POST" action="{{ url('/deleteDependents') }}">
                    		{!! csrf_field() !!}
                    		
                    		<button type="submit" class="button button-select button-select-float">
                                <i class="fa fa-btn fa-user"></i>Delete Selected
                            </button>
                            <a href="{{ url('/addDependent') }}" class="button button-select button-select-float">Add Dependent</a>
	                    	<div class="deps-row">
	                			<div class="deps-row-value depsCkbox"><input type="checkbox" name="dependents_All" id="selectall" value="All"> Select All</div>
	                			<div class="deps-row-value depsHeader">First Name</div>
	                			<div class="deps-row-value depsHeader">Last Name</div>
	                			<div class="deps-row-value depsHeader">Date Of Birth</div>
	                			<div class="deps-row-value depsHeader">Relationship</div>
	                		</div>
	                    	@foreach ($dependents as $dependent)
	                    		<div class="deps-row">
	                    			<!-- <div class="deps-row-value depsCkbox"><input type="checkbox" name="dependents_grp[]" class="dep-checkbox" value="{{ $dependent -> id}}"></div> -->
	                    			<div class="deps-row-value depsCkbox">
	                    				{!! Form::checkbox('dependents_grp[]', $dependent -> id, null, array('class' => 'dep-checkbox')) !!}
	                    			</div>
	                    			<div class="deps-row-value">{{ $dependent-> first_name }}</div>
	                    			<div class="deps-row-value">{{ $dependent-> last_name }}</div>
	                    			<div class="deps-row-value">{{ $dependent-> date_of_birth }}</div>
	                    			<div class="deps-row-value">{{ $dependent-> relationship -> relation_description }}</div>
	                    		</div>
	                    	@endforeach
	                    	<br/>
	                    	
                    </form>
                    @endif
</div>
@endsection