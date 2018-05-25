@extends('layouts.app_home')

@section('content')
<div class="wrapper">
    <div class="page-header" style="background-image: url('assets/img/bg.jpg')">
        <div class="filter"></div>
        <div class="content-center">
            <div class="container">
                <div class="col-md-5 ml-auto mr-auto">
                    <div class="card card-contact no-transition">
                        <h6 class="card-title text-center">Selamat datang</h6>
                        <h4 class="text-center">KPU USD</h4>
                        <p>User Login</p>
                        <div class="col-md-12 mr-auto ml-auto">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                <div class="card-body">
                                    {{ csrf_field() }}
                                    @if ($errors->any())
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <div class="text-danger" style="margin-top: -20px">
                                            <strong>{{ $error }}</strong>
                                        </div>
                                        @endforeach
                                    </ul>
                                    @endif
                                    <div class="form-group">
                                        <input id="nim" type="text" placeholder="NIM" class="form-control" name="nim" value="{{ old('nim') }}" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <button class="btn btn-danger btn-block btn-round" type="submit">Login</button>
                                    </div>
                                    <span class="text-muted  text-center">Belum mendaftar?</span> <a href="{{ route('register')}}">Daftar disini</a>
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
