@extends('layouts.sidenav')

@section('content')
<div id="app">
    @if(auth()->check())
    <yourproject-component id="{!!$id!!}" :usernow="{{ Auth::user() }}"></yourproject-component>
    @endif
</div>
@endsection
