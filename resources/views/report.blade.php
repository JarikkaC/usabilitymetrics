@extends('layouts.sidenav')

@section('content')
<div id="app">
   <report-component :usernow="{{ Auth::user() }}"></report-component>
</div>

@endsection