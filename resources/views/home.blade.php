@extends('layouts.app')


@section('content')

                    <br/>
                    <a href="{{ url('/dependentsInfo') }}">Dependents Info</a>
                    <br/>
                    <a href="{{ url('/visaInfo') }}">VISA Info</a>
                    <br/>
                    <a href="{{ url('/visaDocuments') }}">VISA Docs</a>
                    <br/>
                    <a href="{{ url('/help') }}">Help</a>
                
@endsection
