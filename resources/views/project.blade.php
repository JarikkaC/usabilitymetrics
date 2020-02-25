@extends('layouts.sidenav')

@section('content')
<div id="app">
    @if(auth()->check())
    <create-component :usernow="{{ Auth::user() }}"></create-component>
    @endif
</div>
@endsection