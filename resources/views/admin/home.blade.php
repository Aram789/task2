@extends('layouts.app')

@section('content')
    <strong style="font-size: 40px">Welcome {{auth()->user()->name}}</strong>
@endsection
