@extends('layouts.app')

@section('content')
    @if(isset($history))
        <form action="{{route('histories.update', $history->id)}}" method="post">
            @csrf
            @method('PUT')
            @if(isset($message))
                <strong class="text-success"> {{$message}}</strong>
            @endif
            <div class="card w-25 mb-3 p-2">
                <strong class="d-block">Title: {{$history->title}}</strong>
                <strong class="d-block">Description{{$history->description}}</strong>
                <small class="d-block" style="font-size: 10px">Created{{$history->created_at}}</small>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Approve</button>
            </div>
        </form>
    @endif
@endsection
