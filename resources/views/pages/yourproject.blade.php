@extends('layouts.sidenav')

@section('content')
<div id="app">
    @if(auth()->check())
    <project-component id="{!!$id!!}" :usernow="{{ Auth::user() }}"></project-component>
    @endif
</div>
@endsection
