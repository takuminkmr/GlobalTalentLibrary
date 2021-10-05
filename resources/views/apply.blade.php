@extends('layouts.app')

@section('content')
<div class="container apply">
    <h3 class="my-3 my-lg-5 text-center">面会申込みフォーム</h3>
    <div class="row justify-content-center">
        <div class="col-md-3 img-box">
            <img src="{{ Storage::url($global_talent->photo) }}">
            <h4 class="mt-3">{{ $global_talent->gt_name }}</h4>
            <h6 class="mb-3">{{ $global_talent->faculty }}</h6>
        </div>
        <div class="col-md-7">
            <form method="POST" action="{{ route('complete') }}">
            @csrf
                <div class="form-group row">
                    <label for="meet_option_day" class="col-md-4 col-form-label text-md-right">面会希望日程</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="meet_option_day" name="meet_option_day" value="" placeholder="４月１日、４月２日、４月３日、・・・" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4 col-form-label text-md-right">面会方法</div>
                    <div class="col-md-8 col-form-label">
                        <div class="form-check my-1">
                            <input class="form-check-input" type="radio" name="meet_way" id="meet_way1" value="1" required>
                            <label class="form-check-label" for="meet_way1">ウェブ面談で</label>
                        </div>
                        <div class="form-check my-1">
                            <input class="form-check-input" type="radio" name="meet_way" id="meet_way2" value="2">
                            <label class="form-check-label" for="meet_way2">オフィスに招待して</label>
                        </div>
                        <div class="form-check my-1">
                            <input class="form-check-input" type="radio" name="meet_way" id="meet_way3" value="3">
                            <label class="form-check-label" for="meet_way3">カフェなど待ち合わせ場所を別途決めて</label>
                        </div>
                        <div class="form-check my-1">
                            <input class="form-check-input" type="radio" name="meet_way" id="meet_way4" value="4">
                            <label class="form-check-label" for="meet_way3">その他の方法で</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4 col-form-label text-md-right">面会目的</div>
                    <div class="col-md-8 col-form-label">
                        <div class="form-check my-1">
                            <input class="form-check-input" type="radio" name="meet_purpose" id="meet_purpose1" value="1" required>
                            <label class="form-check-label" for="meet_purpose1">社員として採用を検討</label>
                        </div>
                        <div class="form-check my-1">
                            <input class="form-check-input" type="radio" name="meet_purpose" id="meet_purpose2" value="2">
                            <label class="form-check-label" for="meet_purpose2">インターンシップのお誘い</label>
                        </div>
                        <div class="form-check my-1">
                            <input class="form-check-input" type="radio" name="meet_purpose" id="meet_purpose3" value="3">
                            <label class="form-check-label" for="meet_purpose3">ちょっと手伝ってほしいことがある</label>
                        </div>
                        <div class="form-check my-1">
                            <input class="form-check-input" type="radio" name="meet_purpose" id="meet_purpose4" value="4">
                            <label class="form-check-label" for="meet_purpose4">あなたやあなたの国・文化などの話が聞きたい</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="purpose_detail" class="col-md-4 col-form-label text-md-right">お誘いのメッセージ</label>
                    <div class="col-md-8">
                        <textarea class="form-control" id="purpose_detail" name="purpose_detail" rows="5" required autofocus></textarea>
                    </div>
                </div>
                <input type="hidden" name="apply_member_id" value="{{ $user }}">
                <input type="hidden" name="apply_gt_id" value="{{ $global_talent->id }}">
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-lg btn-block btn-primary my-4">面会を申し込む</button>
                    </div>
                </div>
            </form>
            <div class="col-md-8 offset-md-4 p-0 text-right">
                <button type="button" class="btn btn-lg btn-danger my-4" onclick="history.back()">戻る</button>
            </div>
                <!-- @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif -->
        </div>
    </div>
</div>
@endsection