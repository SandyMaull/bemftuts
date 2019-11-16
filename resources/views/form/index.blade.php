@extends('template.master')


@section('title')
    Form
@endsection


@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">
            Form
        </li>
        <li class="breadcrumb-item active">
            {{ $bidang }}
        </li>
    </ol>   
@endsection


@section('content')
    
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Form {{ $bidang }} 
            <div class="float-right"><a href="" data-toggle="modal" 
                data-target="#tambahModalForm"><i class="fas fa-user-plus"></i><span>Tambah Form</span></a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Form</th>
                        <th>Response Form</th>
                        <th>Link Form</th>
                        <th>Jumlah Field</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama Form</th>
                        <th>Response Form</th>
                        <th>Link Form</th>
                        <th>Jumlah Field</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                        @foreach ($form as $forms)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{url('/admin'.'/'.$bidang.'/Form'.'/'.$forms->id.'/show')}}">{{ $forms->nama_form }}</a></td>
                        <td>
                            @php
                                $a = $form_jawaban->where('form_id', $forms->id)->first();
                                $jumlahdata = $a['jumlah_data'];
                                if ($jumlahdata === null) {
                                    $jumlahdata = 0;
                                }
                            @endphp
                            <a href="{{url('/admin'.'/'.$bidang.'/Response-Form'.'/'.$forms->id.'/show')}}">
                                {{ $jumlahdata }} - Lihat Response
                            </a>
                        </td>
                        <td>
                            <a href="{{url('/Form'.'/'.$forms->id)}}">Link</a>
                        </td>
                        <td>{{ $forms->jumlah_field }}</td>
                        {{-- <td>{{$post->updated_at}}</td> --}}
                        <td>
                            <a class="text-danger hapusfungsi" data-id="{{ $forms->id }}" data-name="{{ $forms->nama_form }}"
                                data-toggle="modal" data-target="#deleteModal" href="">
                                <i class="fas fa-user-minus"></i> Hapus
                            </a>
                        </td>
                    </tr>
                        @endforeach
                </tbody>
            </table>
            </div>
        </div>
        {{-- <div class="card-footer small text-muted">Last Updated at {{ $updated }} by {{ $updated_by }} - {{ $jbt }}</div> --}}
    </div>
        

    <!-- Modal Delete -->
    <form action="{{ URL('/admin'.'/'.$bidang.'/Form/delete') }}" method="POST">
        @csrf
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda serius ingin menghapus Form ini ?
                <input type="hidden" id="deleteID" name="id">
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" type="submit">Delete</button>
            </div>
            </div>
        </div>
    </div>
    </form>
    <!-- END OF MODAL DELETE -->


    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahModalForm" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Form Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/admin'.'/'.$bidang.'/Form/Tambah')}}" method="POST">
                        @csrf
                    <div class="form-group">
                        <label for="nama_form" class="col-form-label">Nama Form:</label>
                        <input type="text" class="form-control" id="nama_form" name="nama_form">
                    </div>
                    <div class="form-group">
                        <label for="jum" class="col-form-label">Jumlah Field pada Form:</label>
                        <input type="text" class="form-control" id="jum" name="jumlah">
                    </div>
                </div>
                @if ($bidang == 'MEDINFO')
                    <input type="hidden" name="bidang" value="1">
                @endif
                @if ($bidang == 'Internal')
                    <input type="hidden" name="bidang" value="8">
                @endif
                @if ($bidang == 'BPH')
                    <input type="hidden" name="bidang" value="9">
                @endif
                @if ($bidang == 'Relasi')
                    <input type="hidden" name="bidang" value="10">
                @endif
                @if ($bidang == 'Sospol')
                    <input type="hidden" name="bidang" value="11">
                @endif
                @if ($bidang == 'Ekraf')
                    <input type="hidden" name="bidang" value="12">
                @endif
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah Form</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- END OF MODAL TAMBAH -->


@endsection


@section('script')
    <script nonce="4LLScR1pT1H4V3" src="{{asset('assets/auth/script2.js')}}"></script>
@endsection
