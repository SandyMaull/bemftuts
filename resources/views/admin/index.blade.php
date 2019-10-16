@extends('template.master')


@section('title')
    Dashboard
@endsection


@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">
        Dashboard
        </li>
    </ol>    
@endsection


@section('content')
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-user-friends"></i>
                </div>
                <div class="mr-5">{{ $totalmhs }} Total Mahasiswa</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{url('/mahasiswa')}}">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
            <div class="card-body-icon">
                <i class="fas fa-fw fa-user-friends"></i>
            </div>
            <div class="mr-5">{{ $totalpng }} Total Pengurus</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{url('/admin')}}">
            <span class="float-left">View Details</span>
            <span class="float-right">
                <i class="fas fa-angle-right"></i>
            </span>
            </a>
        </div>
    </div>
</div>
    <h1>Blank Page</h1>
    This page is still blank, and good to be blank :)
<br><br>
    <p><i>#kuronekosan - Crazy Lazy People</i></p>
@endsection