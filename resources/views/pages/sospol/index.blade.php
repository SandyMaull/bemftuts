@extends('template.pages_temp.app')

@section('title')
	Sospol - Home
@endsection


@section('body')
	<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4" >Sosial Politik</h1>
				<hr>
			</div>
		</div>
		<div class="row welcome text-center">
			<div class="col-12">
				<p class="lead">Bidang Sosial Politik berperan sebagai penggerak intelektual dan moral
						dengan semangat militan. Mengkombinasikan kajian dan kemasyarakatan guna
						mengontrol kebijakan dalam tatanan birokrasi regional dan nasional. Menciptakan
						kepekaan sosial terhadap masyarakat, bidang ini terbagi menjadi 2 departemen
						yaitu :
				</p>
			</div>
			<div class="col-12 col-lg-6 col-sm-12 col-xs-12">
				<h3>Departemen KASTRAT (Kajian Strategis dan Aksi Strategis)</h3>
				<p>
					Departemen Kastrat bertugas mengkaji permasalahan yang ada di negara
					ini mengenai isu sosial dan politik; menganalisis fenomena yang terjadi di
					masyarakat dengan pendekatan ilmiah. Lalu menentukan Aksi yang strategis
					untuk penyelesaian masalah.
				</p>
			</div>
			<div class="col-12 col-lg-6 col-sm-12 col-xs-12">
				<h3>Departemen PENGMAS (Pengabdian Masyarakat)</h3>
				<p>
					Melakukan kegiatan dan mewadahi mahasiswa FT UTS untuk
					memberikan kontribusi sebagai bentuk kepedulian dalam berbagai permasalahan
					sosial dan kemasyarakatan.
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