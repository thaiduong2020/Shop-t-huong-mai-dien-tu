@extends('admin.master')
@section('title')
    Quản lý thành viên
@endsection
@section('content')
    <el-user @if (Auth::check())
    user="{{ Auth::user()->id }}"
    @endif></el-user>
@endsection
