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
                        <div class="form-group row mb-0 mt-2">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('編集する') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection