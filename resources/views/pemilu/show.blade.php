@extends('layouts.app_section')

@section('title', $pemilu->tema_pemilu)

@section('content')
<div class="wrapper">
    <div class="main">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6">
                        <form class="form-inline">
                            <h4>{{ $pemilu->tema_pemilu }}</h4>

                        </form>
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
                @role('isAdmin')
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-12">
                                <form method="POST" action="{{ route('pemilu.destroy', $pemilu->id) }}" accept-charset="UTF-8">
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-danger btn-round pull-right">
                                        <i class="fa fa-trash"></i>&nbsp; Hapus
                                    </button>
                                </form>
                                <a href="{{ route('pemilu.edit', $pemilu->id)}}" class="btn btn-sm btn-danger btn-round pull-right" style="margin-right: 5px">
                                    <i class="fa fa-edit"></i>&nbsp; Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole
                <hr>
            </div>
        </div>
        <div class="cd-section section-white" style="margin-top: -70px">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                        <h5 class="title">Paslon</h5>
                        @foreach ($paslon as $i => $p)
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <h6>Paslon {{ $i+1 }}</h6>
                            </div>
                            @role('isAdmin')
                            <div class="col-md-6 col-sm-6" style="margin-top: -5px">
                                <form method="POST" action="{{ route('paslon.destroy', $p->id), $pemilu->id}}" accept-charset="UTF-8">
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-danger btn-round pull-right">
                                        <i class="fa fa-trash"></i>&nbsp; Hapus
                                    </button>
                                </form>
                                <a href="{{ route('paslon.edit', $p->id)}}" class="btn btn-sm btn-danger btn-round pull-right" style="margin-right: 5px">
                                    <i class="fa fa-edit"></i>&nbsp; Edit
                                </a>
                            </div>
                            @endrole
                        </div>
                        <div class="card card-plain card-blog">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-image">
                                        <img class="img" src="{{ asset ('foto_paslon') }}/{{ $p->foto_paslon }}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
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
                                        <hr>
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
                        @endforeach
                    </div>
                </div>
                <div class="row buttons-row">
                    <div class="col-md-4 col-sm-4"></div>
                    <div class="col-md-4 col-sm-4" style="margin-bottom: 20px">
                        @role('isAdmin')
                        <a href="{{ route('paslon.create.id', $pemilu->id) }}"><button class="btn btn-outline-default btn-block btn-round" type="button" > <span class="nc-icon nc-simple-add" aria-hidden="true"></span> &nbsp; Tambah Paslon</button></a>
                        @endrole

                        @role('isAdmin')
                        <!---->
                        @else
                        @if(Auth::user())
                        @if (\Carbon\Carbon::today()->gte(\Carbon\Carbon::parse($pemilu->start_daftar)) AND (\Carbon\Carbon::parse($pemilu->end_daftar)->gte(\Carbon\Carbon::today())))
                        <button class="btn btn-outline-default btn-block btn-round" type="button" data-toggle="modal" data-target="#modal"> <span class="nc-icon nc-simple-add" aria-hidden="true"></span> &nbsp; Daftar sebagai Pemilih</button>
                        @elseif (\Carbon\Carbon::today()->gte(\Carbon\Carbon::parse($pemilu->start_daftar)))
                        <h6 class="text-danger text-center">Pendaftaran calon pemilih sudah ditutup.</h6>
                        @else
                        <h6 class="text-danger text-center">Pendaftaran calon pemilih belum dibuka.</h6>
                        @endif
                        @endif
                        @endrole
                    </div>
                    <div class="col-md-4 col-sm-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-register">
        <div class="modal-content">
            <div class="modal-header no-border-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h6 class="text-muted">Daftar Sebagai Pemilih <br> pada <br>{{ $pemilu->tema_pemilu}}</h6>
                <p class="modal-title text-center text-info">Setelah mendaftar, anda akan menerima token pada email terdaftar yang digunakan untuk melakukan pemilu.</p>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('pemilu.reg', $pemilu->id) }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Password</label>
                        <div>
                            <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <input type="password" placeholder="Password Confirmation" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="modal-footer no-border-footer">
                        <button class="btn btn-danger btn-block btn-round" type="submit">Daftar sebagai Pemilih</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
