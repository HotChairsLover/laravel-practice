@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\AdvPost $item */
    @endphp
    <div class="container">
        <br>
        @include('adv.posts.includes.result_messages')
        <br>
        @if($item->exists)
            <form method="POST" action="{{ route('adv.posts.update', $item->id) }}">
                @method('PATCH')
                @else
                    <form method="POST" action="{{ route('adv.posts.store') }}">
                        @endif
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @include('adv.posts.includes.post_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('adv.posts.includes.post_edit_add_col')
                            </div>
                        </div>
                    </form>
                    @if($item->exists)
                        <br>
                        <form method="POST" action="{{ route('adv.posts.destroy', $item->id) }}">
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
        @endif
    </div>
@endsection
