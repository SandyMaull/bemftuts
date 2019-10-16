<ul class="sidebar navbar-nav">
    <li class="nav-item {{set_active('admin.dashboard')}}">
        <a class="nav-link" href="{{ url('/dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Pages</h6>
        <a class="dropdown-item" href="{{url('/')}}">Home</a>
        <a class="dropdown-item" href="{{url('/login')}}">Login</a>
        <div class="dropdown-divider"></div>
        @if (auth()->user()->bidang->bidang == 'BPH' || auth()->user()->role->roles == 'superadmin' || auth()->user()->id == 11)
            <a class="dropdown-item" href="{{url('/admin/BPH')}}">BPH</a>
        @endif
        @if (auth()->user()->bidang->bidang == 'Internal' || auth()->user()->role->roles == 'superadmin' || auth()->user()->id == 11)
            <a class="dropdown-item" href="{{url('/admin/Internal')}}">Internal</a>
        @endif
        @if (auth()->user()->bidang->bidang == 'Internal' || auth()->user()->role->roles == 'superadmin' || auth()->user()->id == 11)
            <a class="dropdown-item" href="{{url('/admin/Internal/KotakAspirasi')}}">Kotak Aspirasi</a>
        @endif
        @if (auth()->user()->bidang->bidang == 'Relasi' || auth()->user()->role->roles == 'superadmin' || auth()->user()->id == 11)
            <a class="dropdown-item" href="{{url('/admin/Relasi')}}">Relasi</a>
        @endif
        @if (auth()->user()->bidang->bidang == 'Sospol' || auth()->user()->role->roles == 'superadmin' || auth()->user()->id == 11)
            <a class="dropdown-item" href="{{url('/admin/Sospol')}}">Sospol</a>
        @endif
        @if (auth()->user()->bidang->bidang == 'MEDINFO' || auth()->user()->role->roles == 'superadmin' || auth()->user()->id == 11)
            <a class="dropdown-item" href="{{url('/admin/MEDINFO')}}">Medinfo</a>   
        @endif
        @if (auth()->user()->bidang->bidang == 'Ekraf' || auth()->user()->role->roles == 'superadmin' || auth()->user()->id == 11)
            <a class="dropdown-item" href="{{url('/admin/Ekraf')}}">Ekraf</a>     
        @endif
        {{-- <h6 class="dropdown-header">Other Pages:</h6>
        <a class="dropdown-item" href="404.html">404 Page</a>
        <a class="dropdown-item" href="blank.html">Blank Page</a> --}}
        </div>
    </li>
    <li class="nav-item {{set_active('admin.pengurus')}}">
        <a class="nav-link" href="{{url('/admin')}}">
            <i class="fas fa-user-cog"></i>
        <span>Pengurus BEM</span></a>
    </li>
    <li class="nav-item {{set_active('mahasiswa.index')}}">
        <a class="nav-link" href="{{url('/mahasiswa')}}">
        <i class="fas fa-users"></i>
        <span>Mahasiswa Teknik</span></a>
    </li>
</ul>