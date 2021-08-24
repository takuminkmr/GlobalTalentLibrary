@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">登録情報確認</div>
                <div class="card-body">
                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('会社名') }}</label>
                        <div class="col-md-6">
                            <p class="pt-2">{{ $user->entity_name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('役職') }}</label>
                        <div class="col-md-6">
                            <p class="pt-2">{{ $user->position }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('氏名') }}</label>
                        <div class="col-md-6">
                            <p class="pt-2">{{ $user->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
                        <div class="col-md-6">
                            <p class="pt-2">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('電話番号') }}</label>
                        <div class="col-md-6">
                            <p class="pt-2">{{ $user->tel }}</p>
                        </div>
                    </div>
                    <form method="GET" action="{{ route('userProfile.edit', ['id' => $user->id]) }}">
                        @csrf
                        <div class="form-group mb-0 mt-2">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('編集する') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">パスワード変更</div>

                {{-- エラーメッセージ --}}
                @if(count($errors) > 0)
                <div class="container mt-2">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- 更新成功メッセージ --}}
                @if (session('update_password_success'))
                <div class="container mt-2">
                    <div class="alert alert-success">
                        {{session('update_password_success')}}
                    </div>
                </div>
                @endif

                {{-- フォーム --}}
                <div class="card-body">
                    <form method="POST" action="{{route('userProfile.password.update', ['id' => $user->id])}}">
                        @csrf
                        <div class="form-group">
                            <label for="current">現在のパスワード</label>
                            <div>
                                <input id="current" type="password" class="form-control" name="current-password" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">新しいパスワード</label>
                            <div>
                                <input id="password" type="password" class="form-control" name="new-password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm">新しいパスワード（確認用）</label>
                            <div>
                                <input id="confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">変更する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection