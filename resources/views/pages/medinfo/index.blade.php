@extends('template.pages_temp.app')

@section('title')
	Medinfo - Home
@endsection


@section('body')
	<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4" >Media dan Informasi</h1>
				<hr>
			</div>
		</div>
		<div class="row welcome text-center">
			<div class="col-12">
				<p class="lead">Medinfo mengusung keyakinan yang komunikatif, informatif kreatif dan
						apresiatif. Departemen ini merupakan Garda terdepan dalam membentuk citra
						BEM FT UTS dan juga sebagai bukti adanya pergerakan dibalik layar dengan
						tulisan dan propaganda yang dikemas secara artistik, melalui penyebaran media
						massa. Departemen ini terbagi menjadi 2 yaitu :
				</p>
			</div>
			<div class="col-12 col-lg-6 col-sm-12 col-xs-12">
				<h3>Departemen PUSDATIN (Pusat Data dan Informasi)</h3>
				<p>
					Departemen Pusdatin merupakan pusat penyimpanan seluruh data Fakultas
					Teknik mulai dari data individu mahasiswa sampai informasi dari dekanat
					Fakultas Teknik. Departemen ini juga menjadi gerbang pertama penampungan
					data sebelum data di olah menjadi informasi visual oleh departemen media.
				</p>
			</div>
			<div class="col-12 col-lg-6 col-sm-12 col-xs-12">
				<h3>Departemen Media</h3>
				<p>
					Departemen Media bertugas untuk mengelola informasi yang masuk dan
					keluar dari BEM FT UTS dalam bentuk cetak maupun elektronik, membantu
					bidang lain dalam memberikan sarana penyaluran informasi dan publikasi, serta
					melakukan rekam jejak kegiatan BEM FT UTS.
				</p>
			</div>
		</div>
	</div>
	<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4" >Post Kegiatan</h1>
				<hr>
			</div>
		</div>
	</div>
	<div class="container-fluid padding">
			@foreach ($posts as $post)
		<div class="row padding" id="{{$post->id}}">
			<div class="col-lg-6" >
				<img src="{{ asset('assets/img/posts'.'/'.$post->gambar) }}" style="width:100%;height:100%;border-style: solid;border-color: #343a40;" />
			</div>
			<div class="col-lg-6">
				<h2>{{ $post->title }}</h2>
				<p>{{ $post->body }}</p>
			</div>
		</div>
			@endforeach
	</div>
@endsection