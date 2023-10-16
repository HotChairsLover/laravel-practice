@extends('layouts.app')

@section('content')
    <p>{{$item->title}}</p>
    <p>{{$item->category->title}}</p>
    <p>{{$item->user->name}}</p>
    <p>{{$item->price}} ₽</p>
    <p>{{$item->description}}</p>
@endsection
