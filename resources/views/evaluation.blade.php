@extends('layouts.sidenav')

@section('content')
<div id="app">
   <evaluation-component :usernow="{{ Auth::user() }}"></evaluation-component>
</div>
@endsection
