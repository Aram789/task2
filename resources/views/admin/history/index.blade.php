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
                    @if($history->status)
                        <div class="d-flex justify-content-end">
                            <div class="status_approved"></div>
                        </div>
                    @else
                        <div class="d-flex justify-content-end">
                            <div class="status_approved not"></div>
                        </div>
                    @endif
                    <div class="timeline-content">
                        <i class="icon-attachment"></i>
                        <p>Title : {{$history->title}}</p>
                        <p>Description : {{$history->description}}</p>
                        <div class="timeline-time">
                            <small style="font-size: 10px">Created: {{$history->created_at}}</small>
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
