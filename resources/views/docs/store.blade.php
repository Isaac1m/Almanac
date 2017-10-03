@extends('layouts.app')

@section('content')
    Uploaded: {{ $file->getClientOriginalName() }}
@endsection