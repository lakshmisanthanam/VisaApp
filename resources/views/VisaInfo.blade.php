@extends('layouts.app')


{!! Html::style( asset('css/VisaInfo.css') ) !!}
{!! Html::script( asset('js/framework/jquery-1.12.2.min.js') ) !!}

@section('content')

                    <div class="form-data-div">
                    @if (count($visaInfos) == 0)
                        <div class="warn-msg">There are no VISA details available for you!</div><br><div>Click here to add VISA information:<a href="{{ url('/addVisaInfo') }}" class="new-link">Add VISA Info</a></div>
                    @endif
</div>


@endsection
