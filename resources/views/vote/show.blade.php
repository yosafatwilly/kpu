@extends('layouts.app_section')
@section('title', 'Vote - '.$pemilu->tema_pemilu)
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
                                @if (\Carbon\Carbon::today()->gte(\Carbon\Carbon::parse($pemilu->start_daftar)) AND (\Carbon\Carbon::parse($pemilu->end_daftar)->gte(\Carbon\Carbon::today())))
                                <p class="text-success">{{ Carbon\Carbon::parse($pemilu->start_daftar)->format('d M Y') }} - {{ Carbon\Carbon::parse($pemilu->end_daftar)->format('d M Y') }}</p>
                                @else
                                <p class="text-danger">{{ Carbon\Carbon::parse($pemilu->start_daftar)->format('d M Y') }} - {{ Carbon\Carbon::parse($pemilu->end_daftar)->format('d M Y') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-sm-6 col-6">
                                <p>Durasi Pemilu</p>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                @if (\Carbon\Carbon::today()->gte(\Carbon\Carbon::parse($pemilu->start_pemilu)) AND (\Carbon\Carbon::parse($pemilu->end_pemilu)->gte(\Carbon\Carbon::today())))
                                <p class="text-success">{{ Carbon\Carbon::parse($pemilu->start_permilu)->format('d M Y') }} - {{ Carbon\Carbon::parse($pemilu->end_pemilu)->format('d M Y') }}</p>
                                @else
                                <p class="text-danger">{{ Carbon\Carbon::parse($pemilu->start_permilu)->format('d M Y') }} - {{ Carbon\Carbon::parse($pemilu->end_pemilu)->format('d M Y') }}</p>
                                @endif
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
                    <h2 class="title">{{ $pemilu -> tema_pemilu }}</h2>
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
                            <button class="btn btn-round btn-danger" data-toggle="modal" data-target="#vote{{$i}}" style="margin-top: 10px"><i class="nc-icon nc-check-2"></i>&nbsp; Vote</button>
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
                                                <p>ID</p>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <p>{{ $p->id }}</p>
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
        <div class="modal fade" id="vote{{$i}}" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog modal-register">
                <div class="modal-content">
                    <div class="modal-header no-border-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p class="modal-title text-center">Yakin dengan pilihan anda?</p>
                    </div>
                    <div class="modal-body" style="margin-top: -30px;">
                        <form method="POST" action="{{ route('vote.store.id', $pemilu->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="paslon_id" value="{{ $p->id }}" >
                            <div class="form-group">
                                <div class="col-md-11 mr-auto ml-auto">
                                    <p class="modal-title text-center text-info">Jika yakin, masukkan token kemudian klik Vote.</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="password" type="text" placeholder="Masukkan Token" class="form-control" name="token" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger btn-block btn-round" type="submit">Vote</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
