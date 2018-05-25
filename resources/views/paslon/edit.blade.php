@extends('layouts.app_section')

@section('title', 'Edit Paslon - '.$paslon->nama_ketua.'/'.$paslon->nama_wakil)

@section('content')
<div class="wrapper">
    <div class="main">
        <div class="section">
            <div class="container">
                <h3>Edit Paslon</h3>
                <br>
               <form method="POST" action="{{ route('paslon.update', $paslon->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-5 col-sm-5">
                            <div class="form-group">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail img-no-padding" style="max-width: 370px; max-height: 250px;">
                                        <img src="{{ asset ('foto_paslon') }}/{{ $paslon->foto_paslon }}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail img-no-padding" style="max-width: 370px; max-height: 250px;"></div>
                                    <div>
                                        <span class="btn btn-outline-default btn-round btn-file"><span class="fileinput-new">Pilih Foto</span><span class="fileinput-exists">Change</span><input type="file" name="foto_paslon"></span>
                                        <a href="#paper-kit" class="btn btn-link btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7">
                            <div class="form-group">
                                <h6>Ketua</h6>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nama_ketua" value="{{ $paslon->nama_ketua }}" class="form-control border-input" name="nama" required="true" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <input type="text" name="nim_ketua" value="{{ $paslon->nim_ketua }}" class="form-control border-input" required="true" placeholder="NIM">
                            </div>
                            <div class="form-group">
                                <input type="text" name="angkatan_ketua" value="{{ $paslon->angkatan_ketua }}" class="form-control border-input" required="true" placeholder="Angkatan">
                            </div>
                            <div class="form-group">
                                <h6>Program Studi <span class="icon-danger">*</span></h6>
                                <select name="jurusan_ketua" id="jurusan_ketua" class="selectpicker" data-size="10" data-width="auto" data-style="btn btn-outline-default btn-round" data-menu-style="dropdown-default">
                                    <option disabled selected> Pilih Program Studi</option>
                                    <option value="Bimbingan dan Konseling">Bimbingan dan Konseling</option>
                                    <option value="Pendidikan Agama Katolik">Pendidikan Agama Katolik</option>
                                    <option value="Pendidikan Guru Sekolah Dasar">Pendidikan Guru Sekolah Dasar</option>
                                    <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                                    <option value="Pendidikan Sastra Indonesia">Pendidikan Sastra Indonesia</option>
                                    <option value="Pendidikan Ekonomi">Pendidikan Ekonomi</option>
                                    <option value="Pendidikan Akuntansi">Pendidikan Akuntansi</option>
                                    <option value="Pendidikan Matematika">Pendidikan Matematika</option>
                                    <option value="Pendidikan Fisika">Pendidikan Fisika</option>
                                    <option value="Pendidikan Biologi">Pendidikan Biologi</option>
                                    <option value="Pendidikan Kimia">Pendidikan Kimia</option>
                                    <option value="Akuntansi">Akuntansi</option>
                                    <option value="Manajemen">Manajemen</option>
                                    <option value="Ekonomi">Ekonomi</option>
                                    <option value="Sastra Indonesia">Sastra Indonesia</option>
                                    <option value="Sastra Inggris">Sastra Inggris</option>
                                    <option value="Sejarah">Sejarah</option>
                                    <option value="Teknik Elektro">Teknik Elektro</option>
                                    <option value="Teknik Mesin">Teknik Mesin</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Matematika">Matematika</option>
                                    <option value="Farmasi">Farmasi</option>
                                    <option value="Psikologi">Psikologi</option>
                                    <option value="Teologi">Teologi</option>
                                </select>
                            </div>
                            <hr>
                            <div class="form-group">
                                <h6>Wakil Ketua</h6>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nama_wakil" value="{{ $paslon->nama_wakil }}" class="form-control border-input" name="nama" required="true" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <input type="text" name="nim_wakil" value="{{ $paslon->nim_wakil }}" class="form-control border-input" required="true" placeholder="NIM">
                            </div>
                            <div class="form-group">
                                <input type="text" name="angkatan_wakil" value="{{ $paslon->angkatan_wakil }}" class="form-control border-input" required="true" placeholder="Angkatan">
                            </div>
                            <div class="form-group">
                                <h6>Program Studi <span class="icon-danger">*</span></h6>
                                <select name="jurusan_wakil" id="jurusan_wakil" class="selectpicker" data-size="10" data-width="auto" data-style="btn btn-outline-default btn-round" data-menu-style="dropdown-default">
                                    <option disabled selected> Pilih Program Studi</option>
                                    <option value="Bimbingan dan Konseling">Bimbingan dan Konseling</option>
                                    <option value="Pendidikan Agama Katolik">Pendidikan Agama Katolik</option>
                                    <option value="Pendidikan Guru Sekolah Dasar">Pendidikan Guru Sekolah Dasar</option>
                                    <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                                    <option value="Pendidikan Sastra Indonesia">Pendidikan Sastra Indonesia</option>
                                    <option value="Pendidikan Ekonomi">Pendidikan Ekonomi</option>
                                    <option value="Pendidikan Akuntansi">Pendidikan Akuntansi</option>
                                    <option value="Pendidikan Matematika">Pendidikan Matematika</option>
                                    <option value="Pendidikan Fisika">Pendidikan Fisika</option>
                                    <option value="Pendidikan Biologi">Pendidikan Biologi</option>
                                    <option value="Pendidikan Kimia">Pendidikan Kimia</option>
                                    <option value="Akuntansi">Akuntansi</option>
                                    <option value="Manajemen">Manajemen</option>
                                    <option value="Ekonomi">Ekonomi</option>
                                    <option value="Sastra Indonesia">Sastra Indonesia</option>
                                    <option value="Sastra Inggris">Sastra Inggris</option>
                                    <option value="Sejarah">Sejarah</option>
                                    <option value="Teknik Elektro">Teknik Elektro</option>
                                    <option value="Teknik Mesin">Teknik Mesin</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Matematika">Matematika</option>
                                    <option value="Farmasi">Farmasi</option>
                                    <option value="Psikologi">Psikologi</option>
                                    <option value="Teologi">Teologi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <h6>Visi</h6>
                                <textarea class="form-control" name="visi" placeholder="Visi" rows="13", maxlength="150" >{{ $paslon->visi }}</textarea>
                            </div>
                            <div class="form-group">
                                <h6>Misi</h6>
                                <textarea class="form-control" name="misi" placeholder="Misi" rows="13", maxlength="150" >{{ $paslon->misi }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="paslon_fields">
                    </div>
                    <div class="row buttons-row">
                        <div class="col-md-4 col-sm-4" style="margin-bottom: 10px">

                        </div>
                        <div class="col-md-4 col-sm-4" style="margin-bottom: 10px">
                            <a href="{{ URL::previous() }}" class="btn btn-outline-danger btn-block btn-round">Cancel</a>
                        </div>
                        <div class="col-md-4 col-sm-4" style="margin-bottom: 10px">
                            <button class="btn btn-outline-primary btn-block btn-round" style="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#jurusan_ketua").val('{{ $paslon->jurusan_ketua }}');
        $("#jurusan_wakil").val('{{ $paslon->jurusan_wakil }}');
    });
</script>
@endsection
