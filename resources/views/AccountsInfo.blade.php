@extends('layouts.app') 

{!! Html::style( asset('css/AccountsInfo.css') ) !!}
{!! Html::style( asset('css/framework/jquery-ui.css') ) !!}
{!! Html::script( asset('js/framework/jquery-1.12.2.min.js') ) !!}
{!! Html::script( asset('js/framework/jquery-ui.min.js') ) !!}
{!! Html::script( asset('js/AccountsInfo.js') ) !!}
@section('content')


<div class="form-data-div">
	<div id="accounts-header"><h2>Account Information</h2></div>
	<form class="info-form visa-form" role="form" method="POST" action="{{ url('/myAccount') }}">
		{!! csrf_field() !!}

		<div class="two-col-row">
			<div class="cell-value header-cell">First Name</div>
			<div class="cell-value"><input type="text" disabled="disabled" name="first_name" value="{{ $user_data->first_name }}"></div>
		</div>
		<div class="two-col-row">
			<div class="cell-value header-cell">Last Name</div>
			<div class="cell-value"><input type="text" disabled="disabled" name="last_name" value="{{ $user_data->last_name }}"></div>
		</div>
		<div class="two-col-row">
			<div class="cell-value header-cell">Email Address</div>
			<div class="cell-value"><input type="text" disabled="disabled" name="email" value="{{ $user_data->email }}"></div>
		</div>
		<div class="two-col-row">
			<div class="cell-value header-cell">Date Of Birth</div>
			<div class="cell-value"><input type="text" disabled="disabled" name="date_of_birth" value="{{ $user_data->date_of_birth }}" class="date-picker" id="datepicker"></div>
		</div>
		<a href="javascript:void(0);" class="button button-select button-edit" id="edit-link">Edit</a>
		<div id="save-cancel">
			<button type="submit" class="button button-select button-edit">
                <i class="fa fa-btn fa-user"></i>Save
            </button>
			<a href="javascript:void(0);" class="button button-select button-edit" id="cancel-btn">Cancel</a>
		</div>
	</form>
</div>

@endsection