@extends('layouts.app')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                @foreach($paginator as $post)
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"></rect>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">
                                    <a href="{{route('adv.posts.index', ['category' => $post->category->id])}}">{{$post->category->title}}</a>
                                </p>
                                <p class="card-text">{{$post->title}}</p>
                                <p class="card-text">{{$post->price}} ₽</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            <a href="{{route('adv.posts.show', $post->id)}}">View</a>
                                        </button>
                                    </div>
                                    <small class="text-body-secondary">{{$post->published_at}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($paginator->total() > $paginator->count())
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                {{$paginator->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
