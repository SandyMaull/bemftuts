@extends('template.pages_temp.app')

@section('title')
	Ekraf - Home
@endsection


@section('body')
	<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4" >Ekonomi Kreatif</h1>
				<hr>
			</div>
		</div>
		<div class="row welcome text-center">
			<div class="col-12">
				<p class="lead">Bidang Ekraf adalah bagian dari BEM FT UTS yang tugasnya menunjang
					internal BEM FT UTS dari segi finansial yaitu dengan mencari sumber dana
					potensial dari usaha dan bisnis. Bidang Ekraf juga melakukan kerjasama dengan
					individu, instansi, lembaga dan perusahaan yang berpotensi mendatangkan profit,
					meningkatkan kemampuan kewirausahaan melalui program-program Bidang
					Ekonomi Kreatif. Departemen ini terbagi menjadi 2 yaitu :
				</p>
			</div>
			<div class="col-12 col-lg-6 col-sm-12 col-xs-12">
				<h3>Departemen Kewirausahaan</h3>
				<p>
					Departemen Kewirausahaan bertanggung jawab untuk mendukung dan
					menunjang BEM Fakultas Teknik UTS dalam menjalankan berbagai program
					kerja khususnya dalam hal keuangan. Departemen ini merupakan wadah bagi
					mahasiswa FT UTS yang berjiwa entrepreneur.
				</p>
			</div>
			<div class="col-12 col-lg-6 col-sm-12 col-xs-12">
				<h3>Departemen Kemitraan</h3>
				<p>
					Departemen Kemitraan adalah departemen yang bertugas untuk mencari
					sponsor yang dapat membantu mendanai program kerja dari BEM FT UTS.
					Selain itu, departemen kemitraan juga menjalin kerjasama dengan pihak di
					luar BEM FT UTS yang saling bersimbiosis mutualisme.
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