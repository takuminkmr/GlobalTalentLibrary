@extends('layouts.app')

@section('content')
<div class="container opinion">
    <h2 class="title">IDEA一覧</h2>
    <div class="row justify-content-center">        
        @foreach($todoOpinions as $opinion)
        <div class="card-deck col-sm-6">
            <div class="card">
                <img class="card-img-top" src="{{ Storage::url($opinion->photo) }}">
                <div class="card-body">
                    <p>{{ $opinion->opinion }}</p>
                    <form method="POST" action="{{ route('opinion.todo') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $opinion->id }}">
                    <input type="hidden" name="todo" value="0">
                    <button type="submit" class="btn btn-success">完了！</button>
                </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <h2 class="title">処理済み</h2>
    <div class="row justify-content-center">        
        @foreach($doneOpinions as $opinion)
        <div class="card-deck row">
            <div class="card col-sm-6">
                <img class="card-img-top img-fluid" src="{{ Storage::url($opinion->photo) }}">
                <div class="card-body">
                    <p>{{ $opinion->opinion }}</p>
                    <form method="POST" action="{{ route('opinion.todo') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $opinion->id }}">
                    <input type="hidden" name="todo" value="1">
                    <button type="submit" class="btn btn-danger">ToDoに戻す</button>
                </form>
                </div>
            </div>
        </div>
        @endforeach        
    </div>
</div>
@endsection