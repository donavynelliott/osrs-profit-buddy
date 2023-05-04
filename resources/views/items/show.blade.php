@extends('layouts.app')

@section('title', 'RS Profit Buddy - ' . $item->name)

@section('content')
{{ $item->name }}
{{ $item->examine }}
@endsection