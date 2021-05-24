@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">面会申込みを受け付けました</div>

                <div class="card-body row">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div style="text-align: center;">Global Talentから面会の応諾がありましたら、ソーシャライズの担当よりお引き合わせ致します。</div>
                    <a type="button" class="btn btn-primary text-decoration-none" href="{{ route('home') }}">Global Talentの一覧へ戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
