@extends('layouts.sidenav')

@section('content')
<div id="app">
    @if(auth()->check())
    <reportpage-component picture_path="{!!$picture_path!!}" :usernow="{{ Auth::user() }}"></reportpage-component>
    @endif
</div>
@endsection