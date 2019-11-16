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
        <li class="breadcrumb-item">
            <a href={{url('/admin'.'/'.$bidang.'/Form')}}>{{ $bidang }}</a>
        </li>
        <li class="breadcrumb-item">
            {{$form->nama_form}}
        </li>
        <li class="breadcrumb-item active">
            Response
        </li>
    </ol>   
@endsection


@section('content')
    
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Form {{ $bidang }} 
            <div class="float-right">
                <a href="{{url('/admin'.'/'.$bidang.'/Form'.'/'.$form->id.'/export')}}">
                    <i class="fas fa-user-plus"></i>
                    <span>Export Form</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        @foreach ($form_field['nama_field'] as $field)
                        <th>{{ $field }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        @foreach ($form_field['nama_field'] as $field)
                        <th>{{ $field }}</th>
                        @endforeach
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $looping = 1;
                    @endphp
                    @for ($i = 0; $i < $count = count($form_jawaban['jawaban_field']); $i++)

                        <tr>
                            <td>{{$looping}}</td>
                            @for ($a = 0; $a < $jumlah; $a++)
                                <td>{{$form_jawaban['jawaban_field'][$i][$a]}}</td>
                            @endfor
                        </tr>
                        @php
                            $looping += 1;
                        @endphp
                    @endfor
                </tbody>
            </table>
            </div>
        </div>
    </div>

@endsection