@extends('layouts.app')

@section('content')
<div class="container interest">
    <h2 class="title">気になる人一覧</h2>
    <div class="row justify-content-between">
        @foreach($interests as $interest)
        <div class="card-deck col-md-6 col-lg-4">
            <div class="card">
                <a class="text-decoration-none" href="/detail/{{ $interest->id }}">
                <img src="{{ Storage::url($interest->photo) }}">
                <div class="card-body">
                    <h5 class="card-title name">{{ $interest->gt_name }}</h5>
                    <h5 class="card-title">{{ $interest->school }}　{{ $interest->faculty }}</h5>
                    <p class="card-text">{!! nl2br(e(Str::limit( $interest->introduction, 80))) !!}</p>
                </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
