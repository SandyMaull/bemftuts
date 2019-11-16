@extends('template.pages_temp.app')

@section('title')
	Registrasi akun Website Pengurus BEM-FT UTS 2019
@endsection

@section('body')
<div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h1 class="display-4" >Registrasi akun Website Pengurus BEM-FT UTS 2019</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{url('/Registrasi-Store')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="input-nama" required>
                        <small id="input-nama" class="form-text text-muted">Contoh Penginputan: "Sandy Maulana"</small>
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM:</label>
                        <input type="text" class="form-control" id="nim" name="nim" aria-describedby="input-nim" required>
                        <small id="input-nim" class="form-text text-muted">Contoh Penginputan: "17.01.071.106"</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="input-email" required>
                        <small id="input-email" class="form-text text-muted">Contoh Penginputan: "sandy@google.co.lc"</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" aria-describedby="input-password" required>
                        <small id="input-password" class="form-text text-muted">Contoh Penginputan: Bebas, asalkan diinget ajah wkwk 
                            {Saran: 6 karakter atau lebih dan terdiri dari angka dan huruf}</small>
                    </div>
                    <div class="form-group">
                        <label for="no-telp">No.Telp:</label>
                        <input type="text" class="form-control" id="no-telp" name="notelp" aria-describedby="input-no-telp" required>
                        <small id="input-no-telp" class="form-text text-muted">Contoh Penginputan: "082260879023"</small>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Sekarang:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="input-alamat" required>
                        <small id="input-alamat" class="form-text text-muted">Contoh Penginputan: "Jalan Ki Hajar Dewantara 
                            No. 112 Rt 02 Rw 03 Kel. Pekat"</small>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                            <label for="prodi">Prodi</label>
                            <select id="prodi" class="form-control" name="prodi">
                                <option value="1">Teknik Elektro</option>
                                <option value="2">Teknik Industri</option>
                                <option value="3">Teknik Informatika</option>
                                <option value="4">Teknik Metalurgi</option>
                                <option value="5">Teknik Mesin</option>
                                <option value="6">Teknik Sipil</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                            <label for="angkatan">Angkatan</label>
                            <select id="angkatan" class="form-control" name="angkatan">
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                            <label for="bidang">Bidang</label>
                            <select id="bidang" class="form-control" name="bidang">
                                <option value="1">MEDINFO</option>
                                <option value="8">INTERNAL</option>
                                <option value="9">BPH</option>
                                <option value="10">RELASI</option>
                                <option value="11">SOSPOL</option>
                                <option value="12">EKRAF</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                            <label for="keanggotaan">Keanggotaan</label>
                            <select class="form-control" id="keanggotaan" name="role">
                                <option value="2">Kabid/Kadept/Anggota BPH</option>
                                <option value="3">Anggota Departemen</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="created_by" class="form-control" value="Form_Registrasi">
                <button type="submit" class="btn btn-primary">Registrasi</button>
            </form>
        </div>
    </div>

</div>
@endsection

