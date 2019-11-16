@extends('template.master')


@section('title')
    {{ $bidang }} Pages
@endsection


@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">
            {{ $bidang }}
        </li>
    </ol>    
@endsection


@section('content')
    
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Postingan {{ $bidang }} <div class="float-right"><a href="" data-toggle="modal" 
                data-target="#tambahModal"><i class="fas fa-user-plus"></i><span>Tambah Data</span></a></div></div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Dibuat pada</th>
                        <th>Diedit pada</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Dibuat pada</th>
                        <th>Diedit pada</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                        @foreach ($posts as $post)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{url('/admin'.'/'.$bidang.'/'.$post->id.'/show')}}">{{$post->title}}</a></td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td>
                            <a class="text-danger hapusfungsi" data-id="{{ $post->id }}"
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
        <div class="card-footer small text-muted">Last Updated at {{ $updated }} by {{ $updated_by }} - {{ $jbt }}</div>
    </div>
        

    <!-- Modal Delete -->
    <form action="{{ URL('/admin'.'/'.$bidang.'/Delete') }}" method="POST">
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
                Apakah anda serius ingin menghapus Postingan ini ?
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
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Postingan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/admin'.'/'.$bidang.'/Tambah')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Title:</label>
                        <input type="text" class="form-control" id="recipient-name" name="title">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Body:</label>
                        <textarea class="form-control" id="message-text" name="body" rows="15"></textarea>
                        <input type="hidden" name="userid" value="{{auth()->user()->id}}">
                        <input type="hidden" name="bidangid" value='{{ $bidang_id }}'>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Header Image</label>
                        <input type="file" class="form-control-file" accept="image/x-png,image/jpg,image/jpeg" id="gambar" name="gambar" />
                        <span>jpeg,jpg,png - Max 8 MB</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah Data</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- END OF MODAL TAMBAH -->


@endsection


@section('script')
    <script nonce="4LLScR1pT1H4V3" src="{{asset('assets/auth/script.js')}}"></script>
@endsection