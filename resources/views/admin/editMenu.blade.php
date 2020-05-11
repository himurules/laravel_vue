@extends('layouts.app')

@section('content')
    <!-- Add/Edit Menu Items start-->
    <menu-editor :categories="{{$categories}}"></menu-editor>
    <!-- Add/Edit Menu Items end-->
@endsection
