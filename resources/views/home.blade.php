@extends('layouts.app')

@section('content')
<div class="container home">
    <div class="row justify-content-center">
        <div class="col-md-12">            
            <div class="new-face wrap">
            <h2>新着Global Talents</h2>
                <div class="card-deck">
                    @foreach($new_faces as $new_face)
                    <div class="card">  
                        <a class="text-decoration-none" href="/detail/{{ $new_face->id }}">
                        <img src="{{ Storage::url($new_face->photo_path) }}">
                        <div class="card-body">
                        <h5 class="card-title">{{ $new_face->gt_name }}</h5>
                        <p class="card-text">{!! nl2br(e(Str::limit($new_face->introduction, 80))) !!}</p>
                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="index wrap">
            <h2>Global Talents一覧</h2>
                <div class="card-deck first-row">
                @foreach($global_talent_names as $global_talent_name)
                    <div class="card">  
                        <a class="text-decoration-none" href="/detail/{{ $global_talent_name->id }}">
                        <img src="{{ Storage::url($global_talent_name->photo_path) }}">
                        <div class="card-body">
                        <h5 class="card-title">{{ $global_talent_name->gt_name }}</h5>
                        <p class="card-text">{!! nl2br(e(Str::limit($global_talent_name->introduction, 80))) !!}</p>
                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="card-deck second-row">
                @foreach($global_talent_introductions as $global_talent_introduction)
                    <div class="card">  
                        <a class="text-decoration-none" href="/detail/{{ $global_talent_introduction->id }}">
                        <img src="{{ Storage::url($global_talent_introduction->photo_path) }}">
                        <div class="card-body">
                        <h5 class="card-title">{{ $global_talent_introduction->gt_name }}</h5>
                        <p class="card-text">{!! nl2br(e(Str::limit($global_talent_introduction->introduction, 80))) !!}</p>
                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <!-- <button class="btn btn-lg btn-primary" onclick="location:href='#'">Global Talents検索画面へ</button> -->
            </div>
            <div class="success-story wrap">
            <h2>活躍の物語</h2>
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
            </div>
        </div>
    </div>
</div>
@endsection
