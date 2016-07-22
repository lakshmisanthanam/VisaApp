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
			<div class="cell-value">
				<input type="text" disabled="disabled" name="first_name" value="{{ $user_data->first_name }}">
				@if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif	
			</div>
		</div>
		<div class="two-col-row">
			<div class="cell-value header-cell">Last Name</div>
			<div class="cell-value">
				<input type="text" disabled="disabled" name="last_name" value="{{ $user_data->last_name }}">
				@if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
			</div>
		</div>
		<div class="two-col-row">
			<div class="cell-value header-cell">Email Address</div>
			<div class="cell-value">
				<input type="text" disabled="disabled" name="email" value="{{ $user_data->email }}">
				@if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
			</div>
		</div>
		<div class="two-col-row">
			<div class="cell-value header-cell">Date Of Birth</div>
			<div class="cell-value">
				<input type="text" disabled="disabled" name="date_of_birth" value="{{ $user_data->date_of_birth }}" class="date-picker" id="datepicker">
				@if ($errors->has('date_of_birth'))
                    <span class="help-block">
                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                    </span>
                @endif
			</div>
		</div>

		<a href="#" class="button button-select button-edit" id="edit-link">Edit</a>
		<div id="save-cancel">
			<button type="submit" class="button button-select button-edit">
                <i class="fa fa-btn fa-user"></i>Save
            </button>
			<a href="javascript:void(0);" class="button button-select button-edit" id="cancel-btn">Cancel</a>
		</div>

		@if (count($errors) > 0)
			<script type="text/javascript">
				jQuery(document).ready(function() {
					jQuery('#edit-link')[0].click();
				});
			</script>
		@endif

		
	</form>
</div>

@endsection