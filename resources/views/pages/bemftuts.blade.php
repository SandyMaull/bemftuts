@extends('template.pages_temp.app')

@section('title')
    Tentang BEM FT UTS
@endsection

@section('body')
    <div class="container-fluid padding" id="Logo">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4">Logo BEM FT UTS</h1>
                <hr>
            </div>
        </div>
        <div class="row padding text-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <img src="{{url( '/assets/img/bem.png' )}}" class="img-fluid" style="width:320px;height:320px;">
                <br>
            </div>
            <div class="col-lg-12">
                <h5>Pandangan Garis Besar</h5>
                <p>
                    Logo BEM-FT UTS berbentuk roda gigi dengan gerigi berjumlah enam buah yang berwarna biru tua 
                    dengan tiga buah segi enam berwarna jingga di tengahnya dan bentuk lingkaran yang didalamnya 
                    bertuliskan badan eksekutif mahasiswa. 
                </p>
                <h3>Makna Logo BEM FT UTS</h3>
            </div>
            <div class="col-lg-6">
                <h5>Roda Bergerigi</h5>
                <p>
                    Berbentuk roda gigi melambangkan ciri khas Teknik  
                </p>
                <h5>Banyaknya Gerigi pada Roda</h5>
                <p>
                    Enam gerigi melambangkan jumlah program studi Fakultas Teknik  
                </p>
            </div>
            <div class="col-lg-6">
                    <h5>3 buah Hexagon(Segienam)</h5>
                    <p>
                        Tiga buah segi enam melambangkan identitas Universitas Teknologi Sumbawa  
                    </p>
                    <h5>Lingkaran Kecil pada Roda</h5>
                    <p>
                        Empat buah lingkaran kecil di sudut gerigi melambangkan empat kultur Fakultas Teknik Universitas Teknologi Sumbawa.  
                    </p>
                </div>
            {{-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h5>Lingkaran</h5>
                <p>
                    Dimaksudkan semua unsur logo tidak keluar dari visi misi Hokusei, dan harapannya UKM Hokusei ini dapat
                    dilihat dari berbagai sudut pandang.

                </p>
            </div> --}}
        </div>
    </div>
@endsection