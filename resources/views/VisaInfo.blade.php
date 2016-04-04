@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="addDeps">
                        <a href="{{ url('/addDependent') }}">Add VISA Info</a>
                    </div>
                    @if (count($visaInfos) == 0)
                        There are no VISA details available for you!
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
