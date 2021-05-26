@extends('layouts.app')

@section('content')
<div class="container gt-show">
    <div class="row justify-content-center wrap">
        <div class="col-md-7">
            <div class="iframe-box"><iframe src="{{ $global_talent->video }}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="Global Talent"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
        </div>
        <div class="col-md-5">
            <h2>{{ $global_talent->gt_name }}</h2>
            <h4>{{ $global_talent->school }}　{{ $global_talent->faculty }}</h4>
            <p>{{ $global_talent->introduction }}</p>
            <form method="GET" action="{{ route('gt.edit', ['id' => $global_talent->id]) }}">
                @csrf
                <div class="form-group row mb-0">
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