@extends('layouts.sidenav')

@section('content')
<div id="app">
    @if(auth()->check())
    <showmetric-component id="{!!$id!!}" :usernow="{{ Auth::user() }}"></showmetric-component>
    @endif
</div>
@endsection