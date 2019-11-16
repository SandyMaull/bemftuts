@extends('template.pages_temp.app')

@section('title')
	Galeri Foto
@endsection


@section('body')
	<div class="container-fluid padding">
		<div class="row text-center padding">
				@foreach ($posts as $post)
			<div class="col-xs-12 col-sm-6 col-md-4">
				<img src="{{ asset('assets/img/posts'.'/'.$post->gambar) }}" style="width:100%;height:100%;border-style: solid;border-color: #343a40;" />
			</div>
				@endforeach
		</div>
		{{ $posts->links() }}
	</div>
@endsection