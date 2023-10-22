@extends('layouts.app')

@section('content')
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('adv.posts.includes.post_show_main_col')
            </div>
            <div class="col-md-3">
                @include('adv.posts.includes.post_show_add_col')
            </div>
        </div>
    </div>
@endsection
