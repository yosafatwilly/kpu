@extends('layouts.app_home')

@section('title', 'Komisi Pemilihan Umum USD')

@section('content')
<div class="wrapper">
    <div class="page-header" style="background-image: url('assets/img/bg.jpg')">
        <div class="filter"></div>
        <div class="content-center">
            <div class="motto">
                <img src="assets/img/logo-kpu-usd.png"  width="99px" height="109px"/>
                <h1 class="text-center">Komisi Pemilihan Umum</h1>
                <h3 class="text-center">Universitas Sanata Dharma</h3>
                <br> 
                <!--<h3 class="text-center">dan berikan suaramu</h3>-->
                @if (Auth::guest())
                <div class="col-md-4 ml-auto mr-auto text-center ">
                    <h4><strong>Bergabunglah dengan KPU dan berikan hak suaramu.</strong></h4>
                    <br/>
                    <div class="buttons">
                        <a href="{{ route('register') }}" class="btn btn-danger btn-round">
                            <i class="nc-icon nc-bookmark-2"></i>&nbsp; Daftar Sekarang
                        </a>
                    </div>

                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
