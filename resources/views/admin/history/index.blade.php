@extends('layouts.app')

@section('content')
    @if(!empty($histories))
        <div class="timeline d-flex">
            @foreach($histories as $history)
                <div class="timeline-row">
                    <div class="timeline-time">
                        {{$history->created_at}}
                    </div>
                    <div class="timeline-content">
                        <i class="icon-attachment"></i>
                        <p>{{$history->title}}</p>
                        <p>{{$history->description}}</p>
                        <div class="thumbs">
                            <img class="img-fluid rounded" src="" alt="Admin">
                        </div>
                        <div class="">
                            <span class="badge badge-pill">Sales</span>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        <div class="d-flex justify-content-center my-3">
            {{ $histories->links() }}
        </div>
    @endif
@endsection
