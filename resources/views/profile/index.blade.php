@extends('layouts.app_section')
@section('title', Auth::user()->nama)
@section('content')
<div class="section">
    <div class="profile-content section">
        <div class="container">
            <div class="row">
                <div class="profile-picture">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new img-no-padding">
                            <center>
                                
                            <img src="{{ asset('assets/img/user-logo.png') }}" alt="...">
                            </center>
                        </div>
                        <div class="name">
                            <h4 class="title text-center">{{ Auth::user()->nama }}<br /><small>{{ Auth::user()->nim}}</small><br /><small>{{ Auth::user()->no_telepon}}</small><br /><small>{{ Auth::user()->email}}</small></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ml-auto mr-auto">
                    <nav class="navbar navbar-transparent" style="margin-top: -25px">
                        <h4 class="title">Terdaftar pada pemilu</h4>
                        @role('isAdmin')
                        <form class="form-inline ml-auto">
                            <a href="{{ route('pemilu.create')}}" class="btn btn-danger btn-round">
                                <i class="nc-icon nc-simple-add"></i>&nbsp; Pemilu
                            </a>
                        </form>
                        @endrole
                    </nav>
                    <script>
                        $('tbody.rowlink').rowlink();
                    </script>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <td>#</td>
                                    <td>Logo</td>
                                    <td>Tema</td>
                                    <td>Penyelengara</td>
                                    <td>Periode</td>
                                    <td>Durasi Mendaftar</td>
                                    <td>Durasi Pemilu</td>
                                    <td>Status Pemilu</td>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                @foreach ($pemilu as $i => $p)
                                <tr class="text-center">
                                    <td><a href="{{ route('vote.show', $p->id)}}"></a>{{ $i+1 }}</td>
                                    <td>
                                        <img src="{{ asset ('logo') }}/{{ $p->logo }}" width="30px" height="30px"/>
                                    </td>
                                    <td>{{ $p->tema_pemilu }}</td>
                                    <td>{{ $p->penyelenggara }}</td>
                                    <td>{{ $p->periode }}</td>
                                    @if (\Carbon\Carbon::today()->gte(\Carbon\Carbon::parse($p->start_daftar)) AND (\Carbon\Carbon::parse($p->end_daftar)->gte(\Carbon\Carbon::today())))
                                    <td class="text-success">
                                        {{ Carbon\Carbon::parse($p->start_daftar)->format('d M Y')}} - <br>
                                        {{ Carbon\Carbon::parse($p->end_daftar)->format('d M Y')}}
                                    </td>
                                    @else
                                    <td class="text-danger">
                                        {{ Carbon\Carbon::parse($p->start_daftar)->format('d M Y')}} - <br>
                                        {{ Carbon\Carbon::parse($p->end_daftar)->format('d M Y')}}
                                    </td>
                                    @endif

                                    @if (\Carbon\Carbon::today()->gte(\Carbon\Carbon::parse($p->start_pemilu)) AND (\Carbon\Carbon::parse($p->end_pemilu)->gte(\Carbon\Carbon::today())))
                                    <td class="text-success">
                                        {{ Carbon\Carbon::parse($p->start_pemilu)->format('d M Y')}} - <br>
                                        {{ Carbon\Carbon::parse($p->end_pemilu)->format('d M Y')}}
                                    </td>
                                    @else
                                    <td class="text-danger">
                                        {{ Carbon\Carbon::parse($p->start_pemilu)->format('d M Y')}} - <br>
                                        {{ Carbon\Carbon::parse($p->end_pemilu)->format('d M Y')}}
                                    </td>
                                    @endif

                                    @if (\Carbon\Carbon::today()->gte(\Carbon\Carbon::parse($p->start_daftar)) AND (\Carbon\Carbon::parse($p->end_daftar)->gte(\Carbon\Carbon::today())) OR \Carbon\Carbon::today()->gte(\Carbon\Carbon::parse($p->start_pemilu)) AND (\Carbon\Carbon::parse($p->end_pemilu)->gte(\Carbon\Carbon::today())))
                                    <td class="text-success"><span class="nc-icon nc-check-2"></span></td>
                                    @else
                                    <td class="text-danger"><span class="nc-icon nc-simple-remove"></span></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
