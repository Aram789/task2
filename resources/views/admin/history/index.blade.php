@extends('layouts.app')

@section('content')
    @if(!empty($histories))
        <form id="filter_notice" class="p-0">
            @csrf
            <select class="form-select mb-3 w-25" aria-label="Default select example" name="active" id="select">
                <option value="1">Published</option>
                <option value="0" >Unpublished</option>
                <option value="all" selected>All</option>
            </select>
        </form>
        <div class="timeline timeline_admin d-flex gap-2 p-0">
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
