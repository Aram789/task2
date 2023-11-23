@extends('layouts.app')

@section('content')
    <form action="{{route('histories.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <x-errors></x-errors>
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp"
                   value="{{old('title')}}">
        </div>
        <div class="mb-3">
            <p class="text-danger"></p>
            <label for="desc" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="desc"> {{old('description')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
