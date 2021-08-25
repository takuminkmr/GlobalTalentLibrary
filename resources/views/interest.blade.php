@extends('layouts.app')

@section('content')
<div class="container interest">
    <h3 class="my-3 my-lg-5 text-center">気になる人一覧</h3>
    <div class="row card-box justify-content-between">
        @foreach($interests as $interest)
        <div class="card-deck col-md-6 col-lg-4 my-3">
            <div class="card">
                <a class="text-decoration-none" href="/detail/{{ $interest->id }}">
                <img src="{{ Storage::url($interest->photo) }}">
                <div class="card-body">
                    <h4 class="card-title text-center">{{ $interest->gt_name }}</h4>
                    <h6 class="card-title text-center mb-3">{{ $interest->school }}　{{ $interest->faculty }}</h6>
                    <p class="card-text">{!! nl2br(e(Str::limit( $interest->introduction, 80))) !!}</p>
                    <form method="POST" action="{{ route('interest.destroy') }}">
                    @csrf
                        <button class="btn btn-lg btn-block btn-danger">気になる人一覧から削除</button>
                        <input type="hidden" name="interest_gt_id" value="{{ $interest->id }}">
                    </form>
                </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
