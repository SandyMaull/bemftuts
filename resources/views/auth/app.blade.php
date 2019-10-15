<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BEM FT UTS - @yield('title')</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="{{ asset('assets/style.css') }}" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/bem.png') }}" sizes="16x16">
</head>
<body class="bg-dark">

    @include('template.pages_temp.navbar')
    @yield('body')
    @include('template.pages_temp.footer')

    <script src="https://use.fontawesome.com/releases/v5.7.0/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


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
    </script>

    
    @yield('script')


</body>
</html>