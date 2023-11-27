@extends('layouts.app')

@section('content')
    @if(!empty($histories))
        <select class="form-select mb-3 w-25" aria-label="Default select example">
            <option value="1" name="active" selected>Active</option>
            <option value="2" name="disabled">Disabled</option>
        </select>
        <div class="timeline d-flex gap-2 p-0">
            @foreach($histories as $history)
                <div class="timeline-row card p-2">
                    <div class="timeline-content">
                        <i class="icon-attachment"></i>
                        <p>Title : {{$history->title}}</p>
                        <p>Description : {{$history->description}}</p>
                        <div class="timeline-time">
                            <small>{{$history->created_at}}</small>
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
