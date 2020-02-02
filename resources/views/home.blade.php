@extends('layouts.app')

@section('content')
<div id="app">
    <welcomeproject-component></welcomeproject-component>
</div>
@endsection




<!-- --------------------------------------------------------------------- -->

<!-- <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!

                </div>
            </div> -->