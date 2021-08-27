@extends('layouts.app')

@section('content')
<div class="container detail">
    <div class="row justify-content-center wrap">
        <div class="col-md-7">
            <div class="iframe-box"><iframe src="{{ $global_talent->video }}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="Global Talent"></iframe></div>
            <script src="https://player.vimeo.com/api/player.js"></script>
        </div>
        <div class="col-md-5">
            <h4>{{ $global_talent->gt_name }}</h4>
            <h6 class="mb-3">{{ $global_talent->school }}　{{ $global_talent->faculty }}</h6>
            <p>{{ $global_talent->introduction }}</p>
            <div>
                <button type="button" class="btn btn-primary btn-lg btn-block my-4" onclick="location.href='/apply/{{ $global_talent->id }}'">会ってみたい</button>

                <form method="POST" action="{{ route('interest.add') }}">
                    @csrf
                    <button type="submit" id="interested" class="btn btn-success btn-lg btn-block my-4" @if(isset($interest[0])) disabled @endif>気になる</button>
                    <input type="hidden" name="interest_gt_id" value="{{ $global_talent->id }}">
                </form>
                <div class="text-right">
                <button type="button" class="btn btn-danger btn-lg my-4" onclick="location.href='{{ route('home') }}'">一覧に戻る</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://player.vimeo.com/api/player.js"></script>
@endsection