@extends('layouts.app')

@section('content')
<div class="container history">
    <h3 class="my-3 my-lg-5 text-center">面会申し込み履歴</h3>
    <div class="row justify-content-center">        
        
        @foreach($apply_meets as $apply_meet)
        <div class="col-lg-8 row wrap">
            <div class="col-md-5">
                <div class="img-box">
                <img src="{{ Storage::url($apply_meet->photo) }}">
                </div>
                <h4 class="text-center mt-3">{{ $apply_meet->gt_name }}</h4>
                <h6 class="text-center mb-3">{{ $apply_meet->school }}　{{ $apply_meet->faculty }}</h6>
            </div>
            <div class="col-md-7">
                <ul class="p-0">
                    <li class="list-unstyled"><span class="font-weight-bold">面会候補日：</span>{{ $apply_meet->meet_option_day }}</li>
                    <li class="list-unstyled"><span class="font-weight-bold">面会方法：</span>{{ $meet_way }}</li>
                    <li class="list-unstyled"><span class="font-weight-bold">面会目的：</span>{{ $meet_purpose }}</li>
                </ul>
            </div>
        </div>
        @endforeach
        
    </div>
</div>
@endsection