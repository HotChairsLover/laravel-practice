@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\AdvCategory $item */
    @endphp
    <div class="container">
        @include('adv.admin.categories.includes.result_messages')
        @if($item->exists)
            <form method="POST" action="{{ route('adv.admin.categories.update', $item->id) }}">
                @method('PATCH')
        @else
            <form method="POST" action="{{ route('adv.admin.categories.store') }}">
        @endif
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @include('adv.admin.categories.includes.item_edit_main_col')
                    </div>
                    <div class="col-md-3">
                        @include('adv.admin.categories.includes.item_edit_add_col')
                    </div>
                </div>
            </form>
    </div>
@endsection
