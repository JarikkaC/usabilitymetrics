@extends('layouts.sidenav')

@section('content')
<div id="app">
    <metric-component :usernow="{{ Auth::user() }}"></metric-component>
</div>
@endsection