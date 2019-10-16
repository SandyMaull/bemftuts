<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BEM FT UTS - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{url('/assets/owl.carousel.min.css')}}" rel="stylesheet"/>
    <link href="{{url('/assets/owl.theme.default.min.css')}}" rel="stylesheet"/>
    <link href="{{ asset('assets/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/bem.png') }}" sizes="16x16">
    <style>
        .owl-prev {
            left: -30px;
        }
        .owl-next {
            right: -30px;
        }
        .owl-prev, .owl-next {
            position: absolute;
            top: 30%;
        }
        .owl-prev span, .owl-next span {
            font-size: 60px;
            color: #787878;
        }
        .owl-theme .owl-nav [class*="owl-"]:hover {
            background-color: transparent;
        }
    </style>
</head>
<body>

    @include('template.pages_temp.navbar')

    @yield('body')
    
    @include('template.pages_temp.footer')
    <audio src="{{url('/assets/music.mp3')}}" loop autoplay>	
        <embed 
            src="{{url('/assets/music.mp3')}}"
            loop="true"
            autostart="true"
            hidden="true"
        mastersound>
    </audio>
    <div class="livechat">
        <a data-toggle="modal" data-target="#AspirasiModal" href="">
            <!-- Single-Finger Tap Icon -->
              <!-- Single-Finger Tap Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
                <circle class="tap-1" cx="89.43" cy="64.48" r="19.46"/>
                <path class="hand-tap" d="M139.93,102.68,98.81,95.75V65.2A9.25,9.25,0,0,0,89.56,56h0a9.25,9.25,0,0,0-9.25,9.25v57.36L71,111.77c-3.61-3.61-8.44-3.89-13.08,0,0,0-7.24,5.84-3.83,9.25l34,34h42.63a9.25,9.25,0,0,0,9.07-7.43l6.82-34.09A9.28,9.28,0,0,0,139.93,102.68Z"/>
            </svg>
            <span>Kotak Aspirasi</span>
        </a>
    </div>
    <form action="{{ URL('/KotakAspirasi') }}" method="POST">
        @csrf
    <div class="modal fade" id="AspirasiModal" tabindex="-1" role="dialog" aria-labelledby="AspirasiModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AspirasiModalLabel">Masukan Aspirasi mu untuk BEM FT</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="form-label">Nama:</label>
                    <input type="text" class="form-control" id="recipient-name" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="message-text" class="form-label">Aspirasi untuk BEM FT:</label>
                    <textarea class="form-control" id="message-text" name="aspirasi" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit">Kirim Aspirasi</button>
            </div>
            </div>
        </div>
    </div>
    </form>
    
    <script src="https://use.fontawesome.com/releases/v5.7.0/js/all.js"></script>
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{url('/assets/owl.carousel.min.js')}}"></script>
    <script src="{{url('/assets/jquery.mousewheel.min.js')}}"></script>
    <script>
        function toggleDropdown (e) {
            const _d = $(e.target).closest('.dropdown'),
                _m = $('.dropdown-menu', _d);
            setTimeout(function(){
                const shouldOpen = e.type !== 'click' && _d.is(':hover');
                _m.toggleClass('show', shouldOpen);
                _d.toggleClass('show', shouldOpen);
                $('[data-toggle="dropdown"]', _d).attr('aria-expanded', shouldOpen);
            }, e.type === 'mouseleave' ? 100 : 0);
        }
        
        $('body')
        .on('mouseenter mouseleave','.dropdown',toggleDropdown)
        .on('click', '.dropdown-menu a', toggleDropdown);

        // audioPlayer();
        // function audioPlayer(){
        //     var currentsong = 0;
        //     $("#audioPlayer")[0].src = $("#playlist li a")[0];
        //     $("#audioPlayer")[0].muted = false;
        //     $("#audioPlayer")[0].play();
        //     $("#playlist li a").click(function(e){
        //         e.preventDefault();
        //         $("#audioPlayer")[0].src = this;
        //         $("#audioPlayer")[0].muted = false;
        //         $("#audioPlayer")[0].play();
        //         $("#playlist li").removeClass("current-song");
        //         currentsong = $(this).parent().index();
        //         $(this).parent().addClass("current-song");
        //     });
        //     $("#audioPlayer")[0].addEventListener("ended", function(){
        //         currentsong++;
        //         if(currentsong == $("#playlist li a").length)
        //             currentsong = 0;
        //         $("#playlist li").removeClass("current-song");
        //         $("#playlist li:eq("+currentsong+")").addClass("current-song");
        //         $("#audioPlayer")[0].src = $("#playlist li a")[currentsong].href;
        //         $("#audioPlayer")[0].muted = false;
        //         $("#audioPlayer")[0].play();
        //     });
        // }
    </script>

    @include('template.message')

    @yield('script')

</body>
</html>