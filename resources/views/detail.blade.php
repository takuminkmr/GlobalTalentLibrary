@extends('layouts.app')

@section('content')
<div class="container detail">
    <div class="row justify-content-center wrap">
        <div class="col-md-7">
            <div class="iframe-box"><iframe src="{{ $global_talent->video }}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="Global Talent"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
        </div>
        <div class="col-md-5">
            <h2>{{ $global_talent->gt_name }}</h2>
            <h4>{{ $global_talent->school }}　{{ $global_talent->faculty }}</h4>
            <p>{{ $global_talent->introduction }}</p>
            <div class="invite">
            <button type="button" class="btn btn-lg btn-primary" onclick="location.href='/apply/{{ $global_talent->id }}'" >会ってみたい</button>
            
            <form method="POST" action="{{ route('interest.add') }}">
            @csrf
                <button type="submit" id="interested" class="btn btn-lg btn-success" @if(isset($interest[0])) disabled @endif>気になる</button>
                <input type="hidden" name="interest_gt_id" value="{{ $global_talent->id }}">
            </form>
            </div>
        </div>
    </div>
</div>
<script src="https://player.vimeo.com/api/player.js"></script>
@endsection