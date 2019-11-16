@extends('template.pages_temp.app')


@section('title')
    {{-- {{ $errorcode }} --}}
@endsection


@section('body')

    <div class="jumbotron jumbotron-fluid" style="width:100%;height:50%;">
        <div class="container">
            @if ($error == "404")
                <h1 class="display-4" style="color:#fff;padding-top:7%;">404 Page Not Found</h1>
                <p class="lead">Halaman yang Anda cari tidak dapat ditemukan!</p>
                <br><br>
                <i><p>Kuronekosan - Pusdatin BEM FT</p></i>
            @elseif ($error == "301")
                <h1 class="display-4" style="color:#fff;padding-top:7%;">301 Moved Permanently</h1>
                <p class="lead">Halaman yang Anda cari mungkin telah dialihkan!</p>
                <br><br>
                <i><p>Kuronekosan - Pusdatin BEM FT</p></i>
            @elseif ($error == "403")
                <h1 class="display-4" style="color:#fff;padding-top:7%;">403 Forbidden</h1>
                <p class="lead">Halaman yang Anda cari tidak dapat diakses karena authorisasi!</p>
                <br><br>
                <i><p>Kuronekosan - Pusdatin BEM FT</p></i>
            @elseif ($error == "500")
                <h1 class="display-4" style="color:#fff;padding-top:7%;">500 Internal Server Error</h1>
                <p class="lead">Internal Server sedang Down!</p>
                <br><br>
                <i><p>Kuronekosan - Pusdatin BEM FT</p></i>
            @else
                <h1 class="display-4" style="color:#fff;padding-top:7%;">Pages Error</h1>
                <p class="lead">Halaman yang Anda cari Error!</p>
                <br><br>
                <i><p>Kuronekosan - Pusdatin BEM FT</p></i>
            @endif
            
        </div>
    </div>
@endsection