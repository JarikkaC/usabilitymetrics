@extends('layouts.sidenav')

@section('content')
<div id="app">
    @if(auth()->check())
    <form-component picture_path="{!!$picture_path!!}"></form-component>
    @endif
</div>
@endsection