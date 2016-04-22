@extends('layouts.app')


{!! Html::style( asset('css/VisaInfo.css') ) !!}
{!! Html::script( asset('js/framework/jquery-1.12.2.min.js') ) !!}

@section('content')

                    <div class="addVisaInfo">
                        <a href="{{ url('/addVisaInfo') }}">Add VISA Info</a>
                    </div>
                    @if (count($visaInfos) == 0)
                        There are no VISA details available for you or your dependents!
                    @endif



@endsection
