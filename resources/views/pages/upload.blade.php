@extends('layouts.sidenav')

@section('content')
<div id="app">
    <upload-component :usernow="{{ Auth::user() }}"></upload-component>
</div>
@endsection