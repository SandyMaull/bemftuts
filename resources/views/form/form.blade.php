@extends('template.pages_temp.app')

@section('title')
	Form - {{$form->nama_form}}
@endsection

@section('body')

  <div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h1 class="display-4" >{{$form->nama_form}}</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{url('/Form'.'/'.$form->id.'/'.'input')}}" method="POST">
                @csrf
                    @php
                        $looping = 0;
                    @endphp
                @foreach ($form_field['nama_field'] as $field)
                    <div class="form-group">
                        <label for="Input_{{$looping}}">{{$field}}</label>
                        <input type="hidden" id="nama_form" name="nama_form" class="form-control" value="key_jawaban_{{ preg_replace(' /[ -]+/ ', '_', $form->nama_form) }}_">
                        <input type="text" class="form-control" id="Input_{{$looping}}" aria-describedby="Help_{{$looping}}"
                        name="key_jawaban_{{ preg_replace(' /[ -]+/ ', '_', $form->nama_form) }}_{{$looping}}" placeholder="Masukan {{$field}} Anda" required>
                        <small id="Help_{{$looping}}" class="form-text text-muted">Contoh Penginputan: {{ $form_field['contoh_jawaban'][$looping] }}</small>
                    </div>
                    @php
                        $looping += 1;
                    @endphp
                @endforeach
                <input type="hidden" name="jumlah_field" value="{{ $form->jumlah_field }}">
                <button type="submit" class="btn btn-primary">Input Data</button>
            </form>
        </div>
    </div>
</div>

@endsection