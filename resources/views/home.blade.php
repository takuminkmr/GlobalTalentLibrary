@extends('layouts.app')

@section('content')
<div class="container home">
    <h2 class="title-m-t">新着Global Talents</h2>
    <div class="row new-face wrap justify-content-between card-box">            
        @foreach($new_faces as $new_face)    
        <div class="card-deck col-md-6 col-lg-4">
            <div class="card">  
                <a class="text-decoration-none" href="/detail/{{ $new_face->id }}">
                <img src="{{ Storage::url($new_face->photo) }}">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $new_face->gt_name }}</h5>
                    <h6 class="card-text text-center">{{ $new_face->school }}　{{ $new_face->faculty }}</h6>
                    <p class="card-text">{!! nl2br(e(Str::limit($new_face->introduction, 80))) !!}</p>
                </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <h2 class="title-m-t">Global Talents一覧</h2>
    <div class="row index wrap justify-content-between card-box">
        @foreach($global_talent_names as $global_talent_name)    
        <div class="card-deck col-md-6 col-lg-4">
            <div class="card">  
                <a class="text-decoration-none" href="/detail/{{ $global_talent_name->id }}">
                <img src="{{ Storage::url($global_talent_name->photo) }}">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $global_talent_name->gt_name }}</h5>
                    <h6 class="card-text text-center">{{ $global_talent_name->school }}　{{ $global_talent_name->faculty }}</h6>
                    <p class="card-text">{!! nl2br(e(Str::limit($global_talent_name->introduction, 80))) !!}</p>
                </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    {{-- <div class="card-deck second-row">
        @foreach($global_talent_introductions as $global_talent_introduction)
        <div class="card">  
            <a class="text-decoration-none" href="/detail/{{ $global_talent_introduction->id }}">
            <img src="{{ Storage::url($global_talent_introduction->photo) }}">
            <div class="card-body">
                <h5 class="card-title text-center">{{ $global_talent_introduction->gt_name }}</h5>
                <h6 class="card-text text-center">{{ $$global_talent_introduction->school }}</h6>
                <h6 class="card-text text-center">{{ $global_talent_introduction->faculty }}</h6>
                <p class="card-text">{!! nl2br(e(Str::limit($global_talent_introduction->introduction, 80))) !!}</p>
            </div>
            </a>
        </div>
        @endforeach
    </div> --}}
    <!-- <button class="btn btn-lg btn-primary" onclick="location:href='#'">Global Talents検索画面へ</button>
    <h2 class="title-m-t">活躍の物語</h2>
    <div class="success-story wrap">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="../../images/success-case-1-min.jpg">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">お名前A</h5>
                        <h5>業界・職種</h5>
                        <p class="card-text">活躍の様子概要</p>
                        <a href="#" class="btn btn-primary to-story">この人の活躍ストーリーを読む</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 float-right">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">お名前B</h5>
                        <h5>業界・職種</h5>
                        <p class="card-text">活躍の様子あああああああああああああああああああああああああああああああああああ</p>
                        <a href="#" class="btn btn-primary to-story">この人の活躍ストーリーを読む</a>
                    </div>
                </div>
                <div class="col-md-4 img-box">
                    <img src="../../images/success-case-2-min.jpg">
                </div>
            </div>
        </div>
    </div> -->
</div>
@endsection
