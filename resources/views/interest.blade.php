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
                    <h6 class="card-title text-center">{{ $interest->gt_name }}</h6>
                    <p class="card-text text-center mb-3 font-weight-bold">{{ $interest->school }}<br>{{ $interest->faculty }}</p>
                    <h6 class="card-text">{!! nl2br(e(Str::limit( $interest->introduction, 100))) !!}</h6>
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
