@extends('layouts.sidenav')

@section('content')
<div id="app">
    @if(auth()->check())
    <project-component :usernow="{{ Auth::user() }}"></project-component>
    @endif
</div>
@endsection

