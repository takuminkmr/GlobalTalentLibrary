@extends('layouts.app')

@section('content')
<div class="container apply">
    <h2 class="title">面会申込みフォーム</h2>
    <div class="row justify-content-center">
        <div class="col-md-3 img-box">
            <img src="{{ Storage::url($global_talent->photo) }}">
            <h2>{{ $global_talent->gt_name }}</h2>
            <h4>{{ $global_talent->faculty }}</h4>
        </div>
        <div class="col-md-7">
            <form method="POST" action="{{ route('complete') }}">
            @csrf
                <div class="form-group row">
                    <label for="meet_option_day" class="col-md-4 col-form-label text-md-right">{{ __('面会希望日程') }}</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control @error('meet_option_day') is-invalid @enderror" id="meet_option_day" name="meet_option_day" value="" placeholder="４月１日、４月２日、４月３日" required autofocus>
                        @error('entity_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4 col-form-label text-md-right">{{ __('面会方法') }}</div>
                    <div class="col-md-8 col-form-label">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="meet_way" id="meet_way1" value="1" required>
                            <label class="form-check-label" for="meet_way1">ウェブで</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="meet_way" id="meet_way2" value="2">
                            <label class="form-check-label" for="meet_way2">オフィスに招待して</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="meet_way" id="meet_way3" value="3">
                            <label class="form-check-label" for="meet_way3">その他の方法で</label>
                        </div>
                        @error('meet_way')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4 col-form-label text-md-right">{{ __('面会目的') }}</div>
                    <div class="col-md-8 col-form-label">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="meet_purpose" id="meet_purpose1" value="1" required>
                            <label class="form-check-label" for="meet_purpose1">社員として採用を検討</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="meet_purpose" id="meet_purpose2" value="2">
                            <label class="form-check-label" for="meet_purpose2">インターンシップのお誘い</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="meet_purpose" id="meet_purpose3" value="3">
                            <label class="form-check-label" for="meet_purpose3">交流を図るためのカジュアル面談</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="meet_purpose" id="meet_purpose4" value="4">
                            <label class="form-check-label" for="meet_purpose4">その他</label>
                        </div>
                        @error('meet_way')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="purpose_detail" class="col-md-4 col-form-label text-md-right">{{ __('お誘いのメッセージ') }}</label>
                    <div class="col-md-8">
                        <textarea class="form-control @error('purpose_detail') is-invalid @enderror" id="purpose_detail" name="purpose_detail" rows="5" required autofocus></textarea>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="apply_member_id" value="{{ $user }}">
                <input type="hidden" name="apply_gt_id" value="{{ $global_talent->id }}">

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-lg btn-primary">
                            {{ __('面会を申し込む') }}
                        </button>
                    </div>
                </div>
            </form>    
                <!-- @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif -->
        </div>
    </div>
</div>
@endsection