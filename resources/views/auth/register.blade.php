@extends('layouts.app_home')

@section('content')
<div class="wrapper">
    <div class="page-header" style="background-image: url('assets/img/bg.jpg')">
        <div class="filter"></div>
        <div class="content-center">
            <div class="container">
                <div class="col-md-5 ml-auto mr-auto" style="margin-top: 100px">
                    <div class="card card-contact no-transition">
                        <h4 class="text-center">KPU USD</h4>
                        <p>Pendaftaran</p>
                        <div class="col-md-11 mr-auto ml-auto">
                            
                        <p class="text-danger">Data yang anda masukkan akan divalidasi dengan dengan data di SIA, pastikan data yang anda masukkan adalah benar.</p>
                        </div>
                        <div class="col-md-12 mr-auto ml-auto">
                            <form method="POST" action="{{ route('register') }}">
                                <div class="card-body">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <input type="text" placeholder="NIM" class="form-control{{ $errors->has('nim') ? ' is-invalid' : '' }}" name="nim" value="{{ old('nim') }}" required autofocus>
                                        @if ($errors->has('nim'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('nim') }}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <input type="text" placeholder="Nama" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>
                                        @if ($errors->has('nama'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('nama') }}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <input type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <input type="text" placeholder="Nomor Telepon" class="form-control{{ $errors->has('no_telepon') ? ' is-invalid' : '' }}" name="no_telepon" value="{{ old('no_telepon') }}" required autofocus>
                                        @if ($errors->has('no_telepon'))
                                        <div class="invalid-feedback">
                                            <!--{{ $errors->first('no_telepon') }}-->
                                            Gunakan No Telepon seperti pada SIA
                                        </div>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autofocus>
                                        @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="password" placeholder="Password Confirm" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" required autofocus>
                                    </div>

                                    <button class="btn btn-block btn-round btn-danger" type="submit">Register</button>
                                    <br>
                                    <span class="text-muted  text-center">Sudah mendaftar?</span> <a href="{{ route('login')}}">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
