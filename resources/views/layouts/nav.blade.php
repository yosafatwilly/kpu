<div class="container">
    <div class="navbar-translate">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{URL::to('/')}}">KPU USD</a>
        </div>
        <button class="navbar-toggler navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar"></span>
            <span class="navbar-toggler-bar"></span>
            <span class="navbar-toggler-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('vote.index') }}" data-scroll="true" href="javascript:void(0)"><i class="nc-icon nc-tap-01"></i>&nbsp; Vote</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pemilu.index') }}" data-scroll="true" href="javascript:void(0)"><i class="nc-icon nc-settings"></i>&nbsp;Pemilu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('result.index') }}" data-scroll="true" href="javascript:void(0)"><i class="nc-icon nc-single-copy-04"></i>&nbsp; Lihat Hasil Voting</a>
            </li>
            @if (Auth::guest())
            <li class="nav-item">
                <a href="{{ route('login')}}">
                    <button type="button" class="btn btn-round btn-danger">
                        <i class="nc-icon nc-lock-circle-open"></i>&nbsp; Login
                    </button>
                </a>
            </li>
            @else
            <li class="nav-item dropdown">
                <button type="button" class="btn btn-round btn-danger" data-toggle="dropdown" href="javascript:void(0)">
                    <i class="nc-icon nc-user-run"></i>&nbsp; {{ Auth::user()->nama }}
                </button>
                <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                    <a class="dropdown-item" href="{{ route('profile')}}"><i class="nc-icon nc-single-02"></i>&nbsp; Profile</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>&nbsp; Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</div>