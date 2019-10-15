@extends('auth.app')


@section('title')
    Login
@endsection


@section('body')

    
  <div class="container" style="height:100%;width:100%;">
    <div class="card card-login mx-auto mb-5" style="max-width:25rem;margin-top:15%;">
      <div class="card-header">Masuk Untuk Melanjutkan..</div>
      <div class="card-body">
          <form action="{{route('login.post')}}" method="POST">
              @csrf
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputNIM" class="form-control" placeholder="NIM" name="nim" required="required" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="required">
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>

@endsection