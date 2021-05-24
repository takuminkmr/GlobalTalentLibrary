@extends('layouts.app')

@section('content')
<div class="container interest">
    <h2 class="title">気になる人一覧</h2>
    <div class="row">
        @foreach($interests as $interest)
        <a class="text-decoration-none" href="/detail/{{ $interest->id }}">
        <div class="card">
        <img src="{{ Storage::url($interest->photo_path) }}">
            <div class="card-body">
                <h5 class="card-title name">{{ $interest->gt_name }}</h5>
                <h5 class="card-title">{{ $interest->school }}</h5>
                <h5 class="card-title">{{ $interest->faculty }}</h5>
                <p class="card-text">{!! nl2br(e(Str::limit( $interest->introduction, 80))) !!}</p>
            </div>
        </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
