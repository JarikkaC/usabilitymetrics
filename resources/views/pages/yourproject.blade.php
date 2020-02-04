@extends('layouts.app')

@section('content')
<div id="app">

    <project-component></project-component>

    <!-- @if(auth()->check())

    <create-component :usernow="{{ Auth::user() }}"></create-component>
    @endif -->
</div>
@endsection