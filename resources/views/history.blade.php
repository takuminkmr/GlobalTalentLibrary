@extends('layouts.app')

@section('content')
<div class="container history">
    <h2 class="title">面会申し込み履歴</h2>
    <div class="row justify-content-center">        
        
        @foreach($apply_meets as $apply_meet)
        <div class="col-sm-8 row wrap">
            <div class="col-sm-4 gt-sec">
                <div class="img-box">
                <img src="{{ Storage::url($apply_meet->photo_path) }}">
                </div>
                <h5>{{ $apply_meet->gt_name }}</h5>
                <h5>{{ $apply_meet->school }}</h5>
                <h5>{{ $apply_meet->faculty }}</h5>
            </div>
            <div class="col-sm-8 meet-sec">
                <ul>
                    <li class="list-unstyled h5">面会候補日：{{ $apply_meet->meet_option_day }}</li>
                    <li class="list-unstyled h5">面会方法：{{ $meet_way }}</li>
                    <li class="list-unstyled h5">面会目的：{{ $meet_purpose }}</li>
                </ul>
            </div>
        </div>
        @endforeach
        
    </div>
</div>
@endsection