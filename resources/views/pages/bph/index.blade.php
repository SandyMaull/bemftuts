@extends('template.pages_temp.app')

@section('title')
	BPH - Home
@endsection


@section('body')
	<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4" >BPH</h1>
				<hr>
			</div>
			<div class="col-12">
				<p class="lead">Badan Pengurus Harian (BPH) merupakan salah satu badan yang melakukan fungsi control, 
					koordinasi, pengembangan dan peningkatan sistem menajemen administrasi dan keuangan serta komunikasi 
					dalam membangun hubungan internal dan eksternal BEM FT UTS. Badan Pengurus Harian terdiri dari ketua, 
					wakil ketua, sekretaris I, sekretaris II, bendahara I, dan bendahara II.
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