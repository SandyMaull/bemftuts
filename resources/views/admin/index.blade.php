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
@php
    $bidang = auth()->user()->bidang->bidang;
    $bidang_id = auth()->user()->bidang->id;
    $post = $totalpost->where('bidang_id', $bidang_id);
    $form = $totalform->where('bidang_id', $bidang_id);
    if ($post === null) {
        $post_count = 0;
    } else {
        $post_count = $post->count();
    }
    if ($form === null) {
        $form_count = 0;
    } else {
        $form_count = $form->count();
    }
@endphp
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-user-graduate"></i>
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
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
            <div class="card-body-icon">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="mr-5">{{$post_count}} Total Post Bidang {{ $bidang }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{url('/admin'.'/'.$bidang)}}">
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
                <i class="fas fa-align-justify"></i>
            </div>
            <div class="mr-5">{{$form_count}} Total Form Bidang {{ $bidang }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{url('/admin'.'/'.$bidang.'/Form')}}">
            <span class="float-left">View Details</span>
            <span class="float-right">
                <i class="fas fa-angle-right"></i>
            </span>
            </a>
        </div>
    </div>
</div>
<br><br>
    <h1>Progress Web</h1>
    *Beta Release(0.11.1) - 80% (Stable)
<br><br>
    <p><i>Jika menemukan bug/kesalahan pada sistem,
            hub. <a href="https://api.whatsapp.com/send?phone=+6282260879023&text=Halo%2C+Saya+menemukan+bug+di+Website+Bemftuts&source=&data=">
               082260879023
               </a>(Whatsapp) <br>*cantumkan Screenshot kalau bisa.<br><br><br>#kuronekosan - Crazy Mad Computer Scientist</i></p>
@endsection