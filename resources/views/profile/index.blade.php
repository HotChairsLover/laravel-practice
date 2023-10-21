@extends('layouts.app')

@section('content')
    <p>{{$user->name}}</p>
    <p>{{$user->email}}</p>
    <p><a href="{{route('profile.edit')}}">Редактировать</a></p>
@endsection
