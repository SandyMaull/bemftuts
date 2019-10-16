@extends('template.master')


@section('title')
    Data Mahasiswa Fakultas Teknik
@endsection


@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">
        Mahasiswa
        </li>
    </ol>    
@endsection


@section('content')
    
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Mahasiswa Fakultas Teknik <div class="float-right"><a href="" data-toggle="modal" 
                data-target="#tambahModal"><i class="fas fa-user-plus"></i><span>Tambah Data</span></a></div></div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Angkatan</th>
                    <th>Email</th>
                    <th>No.Telp</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Angkatan</th>
                    <th>Email</th>
                    <th>No.Telp</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                    @foreach ($data_mahasiswa as $mhs)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$mhs->nama}}</td>
                    <td>{{$mhs->nim}}</td>
                    <td>{{$mhs->prodi->nama_prodi}}</td>
                    <td>{{$mhs->angkatan}}</td>
                    <td>{{$mhs->email}}</td>
                    <td>{{$mhs->no_telp}}</td>
                    <td>{{$mhs->alamat}}</td>
                    <td>
                        <a class="text-primary" href="" data-id="{{ $mhs->id }}" data-nama="{{ $mhs->nama }}" data-nim="{{ $mhs->nim }}"
                            data-prodi="{{ $mhs->prodi_id }}" data-angkatan="{{ $mhs->angkatan }}" data-email="{{ $mhs->email }}"
                            data-telp="{{ $mhs->no_telp }}" data-alamat="{{ $mhs->alamat }}" data-telegram="{{ $mhs->telegram }}"
                            data-toggle="modal" data-target="#editModalMhs">
                            <i class="fas fa-user-edit"></i>
                        </a>
                        <a class="text-danger hapusfungsi" data-id="{{ $mhs->id }}" data-name="{{ $mhs->nama }}"
                            data-toggle="modal" data-target="#deleteModalMhs" href="">
                            <i class="fas fa-user-minus"></i>
                        </a>
                    </td>
                </tr>
                    @endforeach
            </tbody>
        </table>
        </div>
    </div>
        <div class="card-footer small text-muted">Last Updated at {{ $updated }} by {{ $updated_by }} - {{ $jbt }}</div>
    </div>

    <form action="{{ route( 'mahasiswa.destroy' ) }}" method="POST">
        @csrf
    <div class="modal fade" id="deleteModalMhs" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda serius ingin menghapus data ?
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
    <form action="{{ route('mahasiswa.update') }}" method="POST">
            @csrf
            @method('PUT')
        <div class="modal fade" id="editModalMhs" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <input type="hidden" id="editID" name="id">
                         <input type="hidden" id="editBy" name="editby" value="{{auth()->user()->id}}">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="recipient-name" class="col-form-label">Nama:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="recipient-name"  name="nama" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="recipient-nim" class="col-form-label">NIM:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="recipient-nim"  name="nim" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="recipient-no_telp" class="col-form-label">No.Telp:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="recipient-no_telp"  name="no_telp" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="recipient-angkatan" class="col-form-label">Angkatan:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="recipient-angkatan"  name="angkatan" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="recipient-email" class="col-form-label">Email:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="recipient-email" name="email" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="recipient-alamat" class="col-form-label">Alamat:</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="recipient-alamat" name="alamat" required></textarea>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="recipient-prodi">Prodi</label>
                            </div>
                            <select class="custom-select" id="recipient-prodi" name="prodi">
                                <option value="1">Teknik Elektro</option>
                                <option value="2">Teknik Industri</option>
                                <option value="3">Teknik Informatika</option>
                                <option value="4">Teknik Metalurgi</option>
                                <option value="5">Teknik Mesin</option>
                                <option value="6">Teknik Sipil</option>
                            </select>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="recipient-telegram" name="telegram">
                            <label class="form-check-label" for="recipient-telegram">
                                Sudah Punya Telegram
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <form action="{{route('mahasiswa.create')}}" method="POST">
            @csrf
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tambahModalLabel">Tambah Baru Data Mahasiswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="editBy" name="editby" value="{{auth()->user()->id}}">
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="recipient-name-add" class="col-form-label">Nama:</label>
                </div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="recipient-name-add" name="nama" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="recipient-nim-add" class="col-form-label">NIM:</label>
                </div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="recipient-nim-add" name="nim" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="recipient-no_telp-add" class="col-form-label">No.Telp:</label>
                </div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="recipient-no_telp-add" name="no_telp" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="recipient-angkatan-add" class="col-form-label">Angkatan:</label>
                </div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="recipient-angkatan-add" name="angkatan" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="recipient-email-add" class="col-form-label">Email:</label>
                </div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="recipient-email-add" name="email" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="recipient-alamat-add" class="col-form-label">Alamat:</label>
                </div>
                <div class="col-sm-10">
                    <textarea class="form-control" id="recipient-alamat-add" name="alamat"></textarea>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="recipient-prodi-add">Prodi</label>
                </div>
                <select class="custom-select" id="recipient-prodi-add" name="prodi">
                    <option value="1">Teknik Elektro</option>
                    <option value="2">Teknik Industri</option>
                    <option value="3">Teknik Informatika</option>
                    <option value="4">Teknik Metalurgi</option>
                    <option value="5">Teknik Mesin</option>
                    <option value="6">Teknik Sipil</option>
                </select>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="telegram-check" name="telegram">
                <label class="form-check-label" for="telegram-check">
                    Sudah Punya Telegram
                </label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
        </div>
    </div>
    </div>
    </form>

@endsection


@section('script')
    <script src="{{asset('assets/auth/script2.js')}}"></script>
@endsection