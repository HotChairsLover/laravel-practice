@extends('layouts.app')

@section('content')
    <p>{{$user->name}}</p>
    <p>{{$user->email}}</p>
    <p>{{$user->created_at}}</p>
    <p>{{$user->update_at}}</p>
@endsection
