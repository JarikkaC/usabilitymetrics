@extends('layouts.sidenav')

@section('content')
<div id="app">
    @if(auth()->check())
    <form-component id="{!!$id!!}" :usernow="{{ Auth::user() }}"></form-component>
    @endif
</div>
@endsection