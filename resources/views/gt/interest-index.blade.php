@extends('layouts.app')

@section('content')
    <div class="container history">
        <h3 class="my-3 my-lg-5 text-center">お気に入りランキング</h3>
        <div class="row justify-content-center">

            @foreach ($interests as $interest)
                <div class="col-lg-8 row wrap">
                    <div class="col-md-6 img-box">
                        <img src="{{ Storage::url($interest->photo) }}">
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-center mt-3">{{ $interest->gt_name }}</h4>
                        <h6 class="text-center mb-3">{{ $interest->school }}　{{ $interest->faculty }}</h6>
                        <h6 class="text-center mb-3"><span class="font-weight-bold">お気に入りされた数：</span>{{ $interest->count }}</h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
