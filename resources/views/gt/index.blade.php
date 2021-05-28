@extends('layouts.app')

@section('content')
<div class="container gt-index">
    <div class="row justify-content-center">
        <div class="col-sm-8 register">
            <div class="card">
                <div class="card-header">グローバルタレント登録＆一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="text-decoration-none" href="{{ route('gt.create') }}">新しいグローバルタレントを登録する</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 list">
            <h3>登録済みのグローバルタレント一覧</h3>
            <div class="card-deck">
                @foreach($global_talents as $global_talent)
                <a class="text-decoration-none" href="show/{{ $global_talent->id }}">
                <div class="card">
                <img src="{{ Storage::url($global_talent->photo) }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $global_talent->gt_name }}</h5>
                        <h5 class="card-title">{{ $global_talent->school }} {{ $global_talent->faculty }}</h5>
                        <p class="card-text">{!! nl2br(e(Str::limit( $global_talent->introduction, 80))) !!}</p>
                    </div>
                </div>
                </a>
                @endforeach
            </div>
        </div>        
    </div> 
</div>
@endsection