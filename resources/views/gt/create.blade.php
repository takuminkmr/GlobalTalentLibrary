@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新しいグローバルタレントの登録</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('gt.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="gt_name" class="col-md-4 col-form-label text-md-right">{{ __('氏名') }}</label>

                        <div class="col-md-6">
                            <input id="gt_name" type="text" class="form-control @error('gt_name') is-invalid @enderror" name="gt_name" value="" required autofocus>

                            @error('gt_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="school" class="col-md-4 col-form-label text-md-right">{{ __('学校') }}</label>

                        <div class="col-md-6">
                            <input id="school" type="text" class="form-control @error('school') is-invalid @enderror" name="school" value="" autofocus>

                            @error('school')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="faculty" class="col-md-4 col-form-label text-md-right">{{ __('学部・学科') }}</label>

                        <div class="col-md-6">
                            <input id="faculty" type="text" class="form-control @error('faculty') is-invalid @enderror" name="faculty" value="" required autofocus>

                            @error('faculty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="introduction" class="col-md-4 col-form-label text-md-right">{{ __('紹介文') }}</label>

                        <div class="col-md-6">
                            <textarea id="introduction" class="form-control @error('introduction') is-invalid @enderror" name="introduction" cols="50" rows="6" required autofocus></textarea>

                            @error('introduction')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('写真') }}</label>

                        <div class="col-md-6">
                            <input id="photo" type="file" class="@error('photo') is-invalid @enderror" name="photo" accept="image/jpeg, image/png" required>

                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('動画の埋め込みリンク') }}</label>

                        <div class="col-md-6">
                            <input id="video" type="text" class="form-control @error('video') is-invalid @enderror" name="video" value="" required autofocus>

                            @error('video')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gt_email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                        <div class="col-md-6">
                            <input id="gt_email" type="email" class="form-control @error('gt_email') is-invalid @enderror" name="gt_email" value="" required autofocus>

                            @error('gt_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <input type="checkbox" value="1" required><a href="#">利用規約</a>ならびに<a href="#">個人情報保護方針</a>に同意する
                        </div>
                    </div> -->

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('新規登録する') }}
                            </button>

                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection