@extends('layouts.app_section')
@section('title', 'Edit Pemilu - '.$pemilu->tema_pemilu)
@section('content')
<div class="wrapper">
    <div class="main">
        <div class="section">
            <div class="container">
                <h3>Edit Pemilu</h3>
                <br>
                <form method="POST" action="{{ route('pemilu.update', $pemilu->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-5 col-sm-5">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail img-no-padding" style="max-width: 330px; max-height: 330px;">
                                    <img src="{{ asset ('logo') }}/{{ $pemilu->logo }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail img-no-padding" style="max-width: 330px; max-height: 330px;"></div>
                                <div>
                                    <span class="btn btn-outline-default btn-round btn-file"><span class="fileinput-new">Pilih Logo</span><span class="fileinput-exists">Change</span><input type="file" name="logo"></span>
                                    <a href="#paper-kit" class="btn btn-link btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7">
                            <div class="form-group">
                                <h6>Tema Pemilu <span class="icon-danger">*</span></h6>
                                <input type="text" name="tema_pemilu" value="{{ $pemilu->tema_pemilu }}" class="form-control border-input" required="true" placeholder="Tema Pemilu">
                            </div>
                            <div class="form-group">
                                <h6>Periode <span class="icon-danger">*</span></h6>
                                <input type="text" name="periode" value="{{ $pemilu->periode }}" class="form-control border-input" required="true" placeholder="Periode">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <h6>Durasi Mendaftar<span class="icon-danger">*</span></h6>
                                        <div class='input-group date'>
                                            <input type='text' class="form-control datetimepicker" name="start_daftar" value="{{ \Carbon\Carbon::parse($pemilu->start_daftar)->format('d-m-Y')}}" placeholder="Start Date" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <h6>Sampai</h6>
                                        <div class='input-group date'>
                                            <input type='text' class="form-control datetimepicker" name="end_daftar" value="{{ \Carbon\Carbon::parse($pemilu->end_daftar)->format('d-m-Y')}}" placeholder="End Date" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <h6>Durasi Pemilu<span class="icon-danger">*</span></h6>
                                        <div class='input-group date'>
                                            <input type='text' class="form-control datetimepicker" name="start_pemilu" value="{{ \Carbon\Carbon::parse($pemilu->start_pemilu)->format('d-m-Y')}}" placeholder="Start Date" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <h6>Sampai</h6>
                                        <div class='input-group date'>
                                            <input type='text' class="form-control datetimepicker" name="end_pemilu" value="{{ \Carbon\Carbon::parse($pemilu->end_pemilu)->format('d-m-Y')}}" placeholder="End Date" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <h6>Penyelenggara<span class="icon-danger">*</span></h6>
                                <select name="penyelenggara" id="penyelenggara" class="selectpicker" data-size="10" data-width="auto" data-style="btn btn-outline-default btn-round" data-menu-style="dropdown-default">
                                    <option disabled selected> Pilih Penyelenggara</option>
                                    <option value="Komisi Pemilihan Umum USD">Komisi Pemilihan Umum USD</option>
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
                        </div>
                    </div>
                    <br>
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
    $(function () {
        $('.datetimepicker').datetimepicker({
            format: 'DD-MM-YYYY',
        });
    });
    $(document).ready(function () {
        $("#penyelenggara").val('{{ $pemilu->penyelenggara }}');
    });
</script>
@endsection
