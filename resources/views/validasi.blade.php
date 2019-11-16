@extends('template.pages_temp.app')

@section('title')
	Registrasi akun Website Pengurus BEM-FT UTS 2019
@endsection

@section('body')
<div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h1 class="display-4" >Registrasi akun Website Pengurus BEM-FT UTS 2019</h1>
            <hr>
        </div>
    </div>
    <div class="container" style="height:100%;width:100%;">
        <div class="card card-login mx-auto mb-5" style="max-width:25rem;margin-top:5%;">
            <div class="card-header">Validasi terlebih dahulu sebelum registrasi</div>
            <div class="card-body">
                <form action="{{url('/Registrasi-Accept')}}" method="POST">
                    @csrf
                <div class="form-group">
                <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Lanjutkan</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

