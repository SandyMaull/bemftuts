@extends('template.pages_temp.app')

@section('title')
	Relasi - Home
@endsection


@section('body')
<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4" >Relasi</h1>
				<hr>
			</div>
		</div>
		<div class="row welcome text-center">
			<div class="col-12">
				<p class="lead">Bidang yang bertanggung jawab untuk menjaga hubungan baik dengan
						seluruh masyarakat BEM FT UTS, baik pihak intra-kampus maupun ekstra-
						kampus. Departemen ini terbagi menjadi 2 yaitu :
				</p>
			</div>
			<div class="col-12 col-lg-6 col-sm-12 col-xs-12">
				<h3>Departemen HUMAS (Hubungan Masyarakat)</h3>
				<p>
					Departemen Humas merupakan wajah dari BEM FT UTS yang akan
					merepresentasikan BEM di mata Fakultas Teknik dan masyarakat luas. Tidak
					hanya itu, Departemen Humas juga merupakan penghubung antara BEM dan
					pihak eksternal kampus.
				</p>
			</div>
			<div class="col-12 col-lg-6 col-sm-12 col-xs-12">
				<h3>Departemen INPRO (Interaksi Antar Program Studi)</h3>
				<p>
					Departemen Inpro adalah departemen yang berfungsi menjalin dan
					menciptakan hubungan yang harmonis dan bersinergi dengan 6 Program Studi
					di Fakultas Teknik. Guna meningkatkan kerja sama untuk memberikan dampak
					yang besar terhadap Fakultas Teknik. Ikhtiar untuk mencapai sinergitas tersebut
					merupakan benang yang terajut dalam setiap program kerja dari Departemen
					Inpro.
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