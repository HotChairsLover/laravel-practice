@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        @include('adv.posts.includes.result_messages')
        <br>
        <form method="POST" action="{{ route('profile.update') }}">
            @method('PATCH')
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('profile.includes.profile_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('profile.includes.profile_edit_add_col')
                </div>
            </div>
        </form>
        <br>
        <form method="POST" action="{{ route('profile.forcedDelete') }}">
            @method('DELETE')
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-block">
                        <div class="card-body ml-auto">
                            <button type="submit" class="btn btn-link">Удалить</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </form>
    </div>
@endsection
