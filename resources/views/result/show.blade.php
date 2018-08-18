@extends('layouts.app_section')
@section('title', 'Hasil Voting '.$pemilu->tema_pemilu)
@section('content')
<div class="wrapper">
    <div class="main">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6">
                        <h4>{{ $pemilu->tema_pemilu }}</h4>
                        <h6 style="margin-top: 10px">Diselenggarakan Oleh <span class="text-info">{{ $pemilu->penyelenggara }}</span></h6>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6">
                        <img src="{{ asset ('logo') }}/{{ $pemilu->logo }}" width="70px" height="70px" class="pull-right" style="margin-top: 20px"/>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-5 col-sm-6 col-6">
                                <p>Periode</p>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <p>{{ $pemilu->periode }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-sm-6 col-6">
                                <p>Durasi Pendaftaran Pemilih</p>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <p>{{ Carbon\Carbon::parse($pemilu->start_daftar)->format('d M Y') }} - {{ Carbon\Carbon::parse($pemilu->end_daftar)->format('d M Y') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-sm-6 col-6">
                                <p>Durasi Pemilu</p>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <p>{{ Carbon\Carbon::parse($pemilu->start_permilu)->format('d M Y') }} - {{ Carbon\Carbon::parse($pemilu->end_pemilu)->format('d M Y') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-sm-6 col-6">
                                <p>Jumlah Pemilih</p>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <p>{{ $jumlah_pemilih }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-sm-6 col-6">
                                <p>Sudah memilih</p>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <p>{{ $jumlah_vote }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="container" style="margin-top: -60px">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h3 class="title">Hasil Voting {{ $pemilu -> tema_pemilu }}</h3>
                </div>
            </div>
            <div class="row">
                @foreach ($paslon as $i => $p)
                <div class="col-md-4">
                    <div class="card card-profile card-plain">
                        <div class="card-img-top">
                            <a href="#">
                                <img class="img" data-toggle="modal" data-target="#showProfile{{$i}}"  data-toggle="tooltip" data-placement="top" title="Klik untuk melihat Profil Paslon" src="{{ asset ('foto_paslon') }}/{{ $p->foto_paslon }}" />
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $p->nama_ketua }}</h5>
                            <h5 class="card-title">{{ $p->nama_wakil }}</h5>
                            <button class="btn btn-lg btn-round btn-info" style="margin-top: 10px">{{number_format((float) ($p->count / $jumlah_vote)*100 , 2, '.', '')}}%<br> {{$p->count}} suara </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @foreach( $paslon as $i => $p)
        <!-- Profile Modal -->
        <div class="modal fade" id="showProfile{{$i}}" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog modal-register modal-lg">
                <div class="modal-content">
                    <div class="modal-header no-border-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <!--<h6 class="text-muted">Paslon 1</h6>-->
                        <h4 class="modal-title text-center">Pasangan Calon {{ $i+1 }}</h4>
                    </div>
                    <div class="modal-body" style="margin-top: -30px;">
                        <div class="card card-profile card-plain">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body text-left">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p><strong>KETUA</strong></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6">
                                                <p>Nama</p>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <p>{{ $p->nama_ketua }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6">
                                                <p>NIM</p>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <p>{{ $p->nim_ketua}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6">
                                                <p>Angkatan</p>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <p>{{ $p->angkatan_ketua}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6">
                                                <p>Jurusan</p>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <p>{{ $p->jurusan_ketua}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card card-profile card-plain">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body text-left">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-6 col-6">
                                                <p><strong>WAKIL KETUA</strong></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6">
                                                <p>Nama</p>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <p>{{ $p->nama_wakil }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6">
                                                <p>NIM</p>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <p>{{ $p->nim_wakil}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6">
                                                <p>Angkatan</p>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <p>{{ $p->angkatan_wakil}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6">
                                                <p>Jurusan</p>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <p>{{ $p->jurusan_wakil}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card card-profile card-plain">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <h5 class="text-center"><strong>VISI</strong></h5>
                                        <p class="text-center">{{ $p->visi}}</p>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <h5 class="text-center"><strong>MISI</strong></h5>
                                        <p class="text-center">{{ $p->misi}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer no-border-footer">
                            <button type="button" class="btn btn-link btn-danger btn-lg" data-dismiss="modal" aria-hidden="true"><i class="nc-icon nc-minimal-left"></i>&nbsp; Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
