@extends('layouts.app')


{!! Html::style( asset('css/DependentsInfo.css') ) !!}
{!! Html::script( asset('js/framework/jquery-1.12.2.min.js') ) !!}
{!! Html::script( asset('js/DependentsInfo.js') ) !!}

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                	<div class="addDeps">
                    	<a href="{{ url('/addDependent') }}">Add Dependent</a>
                    </div>
                    @if (count($dependents) == 0)
                    	There are no dependents under you!
                    @else
                    	<form class="form-horizontal" role="form" method="POST" action="{{ url('/deleteDependents') }}">
                    		{!! csrf_field() !!}
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
	                    	<button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i>Delete Selected
                            </button>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection