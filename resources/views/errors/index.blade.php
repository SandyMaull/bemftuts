@extends('template.pages_temp.app')


@section('title')
    {{-- {{ $errorcode }} --}}
@endsection


@section('body')
{{-- {{dd($exception->getStatusCode())}} --}}
    <div class="jumbotron jumbotron-fluid" style="width:100%;height:50%;">
        <div class="container">
          <h1 class="display-4" style="color:#fff;padding-top:7%;">404 Page Not Found</h1>
          <p class="lead">Halaman yang Anda cari tidak dapat ditemukan!</p>
          <br><br>
          <i><p>Kuronekosan - Pusdatin BEM FT</p></i>
        </div>
    </div>
@endsection