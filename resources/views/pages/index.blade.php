@extends('template.pages_temp.app')


@section('title')
	Home
@endsection


@section('body')


	<!--- Image Slider -->
	<div id="slides" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#slides" data-slide-to="0" class="active"></li>
			<li data-target="#slides" data-slide-to="1"></li>
			<li data-target="#slides" data-slide-to="2"></li>
			<li data-target="#slides" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active" >
				<img src="{{ asset('assets/img/uts1.jpg') }}" style="filter: blur(8px);-webkit-filter: blur(8px);">
				<div class="carousel-caption">
					<h1 class="display-2">BEM FT UTS 2019</h1>
					<h3>Kabinet Totalitas Bersinergi</h3>
				</div>
			</div>
			<div class="carousel-item">
				<img src="{{ asset('assets/img/IMG_0089.JPG') }}">
			</div>
			<div class="carousel-item">
				<img src="{{ asset('assets/img/IMG_0044.JPG') }}">
			</div>
			<div class="carousel-item">
				<img src="{{ asset('assets/img/IMG_0111.JPG') }}">
			</div>
		</div>
	</div>
	<div class="container-fluid padding" id="Post_Terbaru">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4" >Post Terbaru</h1>
				<hr>
			</div>
			<div class="col-12">
				<div class="owl-carousel owl-theme">
					@foreach ($posts as $post)
						<div class="item">
							@php
								if ($post->bidang_id == 1) {
									$post_bidang = 'Medinfo';
								} elseif ($post->bidang_id == 8) {
									$post_bidang = 'Internal';
								} elseif ($post->bidang_id == 9) {
									$post_bidang = 'BPH';
								} elseif ($post->bidang_id == 10) {
									$post_bidang = 'Relasi';
								} elseif ($post->bidang_id == 11) {
									$post_bidang = 'Sospol';
								} elseif ($post->bidang_id == 12) {
									$post_bidang = 'Ekraf';
								}

							@endphp		
							<a href="{{ url('/'.$post_bidang.'/#'.$post->id) }}">
								<div class="card">
									<img data-src="{{ asset('assets/img/posts'.'/'.$post->gambar) }}" class="card-img-top owl-lazy" />
									<div class="card-body">
										<h5 class="card-title">{{ Str::limit($post->title, 10) }}</h5>
										{{ Str::limit($post->body, 10) }}
									</div>
								</div>
							</a>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="container-fluid padding" id="Connect">
		<div class="row text-center padding">
				<div class="row welcome text-center">
					<div class="col-12">
						<h1 class="display-4">BEM FT UTS Official Accounts</h1>
						<hr>
					</div>
				</div>
			<div class="col-12 social padding">
				<a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
				<a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
				<a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a>
				<a href="https://www.instagram.com/bem_ftuts/" target="_blank"><i class="fab fa-instagram"></i></a>
				<a href="https://www.youtube.com/channel/UCOxzdDHSixe5tNm613lQN2w" target="_blank"><i class="fab fa-youtube"></i></a>
			</div>
		</div>
	</div>

@endsection


@section('script')

	<script>
		$(document).ready(function() {
			$('#karakter').keyup(function() {
				var len = this.value.length;
				if (len >= 150) {
				this.value = this.value.substring(0, 150);
				}
			$('#hitung').text(150 - len);
			});
		});
		$('.owl-carousel').owlCarousel({
			autoplay: true,
			autoplayHoverPause: true,
			lazyLoad: true,
			margin: 5,
			stagePadding: 5,
			responsive: {
				0: {
					items: 1,
					dots: false
				},
				485: {
					items: 2,
					dots: false
				},
				728: {
					items: 3,
					loop: true
				},
				960: {
					items: 4,
					loop: true
				},
				1200: {
					items: 5,
					dots: false
				}
			}
		});

		$('.owl-carousel').on('mousewheel', '.owl-stage', function(e) {
			if (e.deltaY>0) {
				$('.owl-carousel').trigger('next.owl');
			} else {
				$('.owl-carousel').trigger('prev.owl');
			}
			e.preventDefault();
		});
	</script>
@endsection