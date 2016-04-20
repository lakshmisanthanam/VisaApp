@extends('layouts.app')


{!! Html::style( asset('css/VisaInfo.css') ) !!}
{!! Html::script( asset('js/framework/jquery-1.12.2.min.js') ) !!}

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="addVisaInfo">
                        <a href="{{ url('/addVisaInfo') }}">Add VISA Info</a>
                    </div>
                    @if (count($visaInfos) == 0)
                        There are no VISA details available for you or your dependents!
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
