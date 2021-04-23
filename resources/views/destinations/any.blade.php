@extends('layouts.app');
@section('content');

@foreach ($dest as $d)


{{$d->name}}
    
@endforeach
@endsection