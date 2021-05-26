@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Global Talent情報変更</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('gt.update', ['id' => $global_talent->id]) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('氏名') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="gt_name" value="{{ $global_talent->gt_name }}" required autofocus>

                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="school" class="col-md-4 col-form-label text-md-right">{{ __('学校') }}</label>

                        <div class="col-md-6">
                            <input id="school" type="text" class="form-control @error('school') is-invalid @enderror" name="school" value="{{ $global_talent->school }}" required autofocus>

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
                            <input id="faculty" type="text" class="form-control @error('faculty') is-invalid @enderror" name="faculty" value="{{ $global_talent->faculty }}" required autofocus>

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
                            <textarea id="introduction" class="form-control @error('introduction') is-invalid @enderror" name="introduction" cols="50" rows="6" required autofocus>{{ $global_talent->introduction }}</textarea>

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
                            <input id="photo" type="file" class="@error('photo') is-invalid @enderror" name="photo">

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
                            <input id="video" type="text" class="form-control @error('video') is-invalid @enderror" name="video" value="{{ $global_talent->video }}" required autofocus>

                            @error('video')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="gt_email" value="{{ $global_talent->gt_email }}" required autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('変更する') }}
                            </button> 
                        </div>
                    </div>

                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection