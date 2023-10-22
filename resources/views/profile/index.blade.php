@extends('layouts.app')

@section('content')
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('profile.includes.profile_index_main_col')
            </div>
            <div class="col-md-3">
                @include('profile.includes.profile_index_add_col')
            </div>
        </div>
    </div>
@endsection
