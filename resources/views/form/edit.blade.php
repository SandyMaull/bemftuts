@extends('template.master')

@section('title')
    Form {{ $nama_form }}
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">
            Form
        </li>
        <li class="breadcrumb-item">
            <a href="{{url('/admin'.'/'.$bidang.'/'.'Form')}}">{{ $bidang }}</a>
        </li>
        <li class="breadcrumb-item active">
            Edit Form {{ $nama_form }}
        </li>
    </ol>    
@endsection

@section('content')
<div class="text-center">
    <h2>
        Form {{ $nama_form }}
        <input type="hidden" name="key_{{$nama_form}}_" id="lalalala">
    </h2>
</div>
<form action="{{url('/admin'.'/'.$bidang.'/Form'.'/'.$form->id.'/edit')}}" method="POST">
        @csrf
        @method('PUT')
        @php
            $looping = 0;
        @endphp
    @foreach ($form_field['nama_field'] as $field)
        <div class="form-group">
            <label for="field_{{$looping}}"><h4>Nama Field</h4></label>
            <input type="hidden" id="nama_form" name="nama_form" class="form-control" value="key_{{$nama_form}}_">
            <input type="hidden" name="contoh_form" class="form-control" value="key_contoh_jawaban_">
            <input type="text" class="form-control" id="field_{{$looping}}" name="key_{{$nama_form}}_{{$looping}}"
            value="{{$field}}" required>
            <input type="text" class="form-control form-control-sm" name="key_contoh_jawaban_{{$looping}}"
            value="{{$form_field['contoh_jawaban'][$looping]}}" placeholder="Masukan contoh dari data yang akan diinputkan" required>
        </div>
        @php
            $looping += 1;
        @endphp
    @endforeach

    
    
    <input type="hidden" name="form_id" value="{{ $form_id }}">
    <input type="hidden" name="jumlah_field" value="{{ $jumlah_field }}">
    <button type="submit" class="btn btn-primary">Update Form</button><br><br>
</form>
@endsection