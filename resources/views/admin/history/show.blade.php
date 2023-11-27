@extends('layouts.app')

@section('content')
    @if(isset($history))
        <form action="{{route('histories.update', $history->id)}}" method="post">
            @csrf
            @method('PUT')
            <strong>{{$history->title}}</strong>
            <strong>{{$history->description}}</strong>
            <div>
                <button type="submit" class="btn btn-primary">Approve</button>
            </div>
        </form>
    @endif
@endsection
