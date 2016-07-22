@extends('layouts.app')


{!! Html::style( asset('css/DependentsInfo.css') ) !!}
{!! Html::style( asset('css/VisaInfo.css') ) !!}
{!! Html::script( asset('js/framework/jquery-1.12.2.min.js') ) !!}
{!! Html::script( asset('js/VisaInfo.js') ) !!}

@section('content')

                    <div class="form-data-div">
                    @if (count($visaInfos) == 0)
                        <div class="warn-msg">There are no VISA details available for you!</div><br><div>Click here to add VISA information:<a href="{{ url('/addVisaInfo') }}" class="new-link">Add VISA Info</a></div>

                    @else
						@if ($statusMsg != '') 
                    		<div class="warn-msg">{{ $statusMsg }}</div>
                    	@endif
						<form class="visa-form info-form" role="form" method="POST" action="{{ url('/deleteVisaInfos') }}">
                    		{!! csrf_field() !!}
                    		
                    		<button type="submit" class="button button-select button-select-float">
                                <i class="fa fa-btn fa-user"></i>Delete Selected
                            </button>
                            <a href="{{ url('/addVisaInfo') }}" class="button button-select button-select-float">Add Visa Info</a>
	                    	<div class="deps-row">
	                			<div class="deps-row-value depsCkbox"><input type="checkbox" name="visas_All" id="selectall" value="All"> Select <br> All</div>
	                			<div class="deps-row-value depsHeader">VISA Country</div>
	                			<div class="deps-row-value depsHeader">VISA Category</div>
	                			<div class="deps-row-value depsHeader">VISA Number</div>
	                			<div class="deps-row-value depsHeader">Issued On</div>
	                			<div class="deps-row-value depsHeader">Expiry Date</div>
	                			<div class="deps-row-value depsHeader">Place of Issue</div>
	                			<div class="deps-row-value depsHeader">Issued in Country</div>
	                			<div class="deps-row-value depsHeader">Issued For</div>
	                		</div>
	                    	@foreach ($visaInfos as $visaInfo)
	                    		<div class="deps-row">
	                    			<div class="deps-row-value depsCkbox">
	                    				{!! Form::checkbox('visaInfos_grp[]', $visaInfo -> id, null, array('class' => 'dep-checkbox')) !!}
	                    			</div>
	                    			<div class="deps-row-value">{{ $visaInfo-> getCountry -> description }}</div>
	                    			<div class="deps-row-value">{{ $visaInfo-> getVisaCategory -> visa_category_desc }}</div>
	                    			<div class="deps-row-value">{{ $visaInfo-> visa_number }}</div>
	                    			<div class="deps-row-value">{{ $visaInfo-> issued_on }}</div>
	                    			<div class="deps-row-value">{{ $visaInfo-> expiry_date }}</div>
	                    			<div class="deps-row-value">{{ $visaInfo-> place_of_issue }}</div>
	                    			<div class="deps-row-value">{{ $visaInfo-> issued_in_country }}</div>
	                    			@if ($visaInfo -> for_dependents == 'Dependents')
	                    				<div class="deps-row-value">{{ $visaInfo-> getDependent -> first_name . ' ' . $visaInfo-> getDependent -> last_name}}</div>
	                    			@else 
	                    				<div class="deps-row-value">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</div>
	                    			@endif
	                    		</div>
	                    	@endforeach
	                    	<br/>
	                    	
                    </form>
                    @endif
</div>


@endsection
