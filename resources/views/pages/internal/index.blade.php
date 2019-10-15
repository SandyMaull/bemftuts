@extends('template.pages_temp.app')

@section('title')
	Internal - Home
@endsection


@section('body')
	<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4" >Internal</h1>
				<hr>
			</div>
		</div>
		<div class="row welcome text-center">
			<div class="col-12">
				<p class="lead">Bidang Internal merupakan bagian yang cukup penting dalam BEM FT UTS
						karena mempunyai peranan menjaga komunikasi dan hubungan yang harmonis
						antar prodi pada khususnya dan antar komponen masyarakat yang ada di Fakultas
						Teknik pada umumnya, serta mempersiapkan generasi teknik ke depan, baik
						untuk skala luas (melalui pengenalan kehidupan kampus dan pembinaan kepada
						mahasiswa baru) maupun untuk meneruskan perjuangan di kelembagaan
						mahasiswa. Selain itu, Bidang internal juga berperan sebagai penjembatan antar
						mahasiswa dengan birokrasi mengenai masalah beasiswa yang ada di lingkup
						Universitas Teknologi Sumbawa. Bidang Internal terbagi menjadi 4 departemen
						yaitu :
				</p>
			</div>
			<div class="col-12 col-lg-6 col-sm-12 col-xs-12">
				<h3>Departemen PSDM (Pengembangan Sumber Daya Mahasiswa)</h3>
				<p>
					Departemen PSDM berperan dalam pengkaderan, penjagaan, serta
					pengembangan potensi mahasiswa, dalam internal maupun eksternal BEM FT
					UTS. PSDM bertanggung jawab menjaga suhu organisasi agar tetap stabil bahkan
					meningkatkan.
				</p>
			</div>
			<div class="col-12 col-lg-6 col-sm-12 col-xs-12">
				<h3>Departemen ADKESMA (Advokasi dan Kesejahteraan Mahasiswa)</h3>
				<p>
					Departemen Adkesma merupakan departemen yang bertugas untuk
					menampung keluhan yang diajukan mahasiswa/i Fakultas Teknik yang nantinya
					akan dilanjutkan ke pihak dekanat untuk diproses lebih lanjut.
				</p>
			</div>
			<div class="col-12 col-lg-6 col-sm-12 col-xs-12">
				<h3>Departemen SENIORA (Seni dan Olahraga)</h3>
				<p>
					Departemen Seni dan Olahraga sebagai wadah mahasiswa Fakultas Teknik
					dalam bidang seni maupun olahraga dan mengembangkan bersama dengan
					berbagai kegiatan.
				</p>
			</div>
			<div class="col-12 col-lg-6 col-sm-12 col-xs-12">
				<h3>Departemen PENRISTEK (Pendidikan, Riset dan Teknologi)</h3>
				<p>
					Departemen Penristek berperan untuk mengembangkan potensi keilmuan
					yang terdapat di Fakultas Teknik agar dapat menjawab tantangan yang ada
					dimasyarakat demi mewujudkan Indonesia menjadi Negara maju. Mahasiswa
					diharapkan berkembang dari segi wawasan, pengetahuan, mental, pola pikir, dan
					orientasi masa depan.
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