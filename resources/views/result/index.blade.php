@extends('layouts.app_section')
@section('title', 'Lihat Hasil Voting')
@section('content')
<div class="section section-white">
    <div class="col-md-11 ml-auto mr-auto">
        <div class="row">
            <div class="col-md-3">
                <h4 class="title">Search</h4>
                <div class="card card-refine">
                    <div class="input-group no-border">
                        <input type="text" placeholder="Search" class="form-control no-border">
                        <span class="input-group-addon no-border"><a href="#" ><i class="nc-icon nc-zoom-split"></i></a></span>
                    </div>
                </div>

                <h4 class="title">Filter</h4>
                <div class="card card-refine">
                    <div class="panel-group" id="accordion" aria-multiselectable="true" aria-expanded="true">
                        <div class="card-header card-collapse" role="tab" id="clothingGear">
                            <h5 class="mb-0 panel-title">
                                <a class="" data-toggle="collapse" data-parent="#accordion" href="#clothing" aria-expanded="true" aria-controls="collapseSecond">
                                    Periode
                                    <i class="nc-icon nc-minimal-down"></i>
                                </a>
                            </h5>
                        </div>
                        <div id="clothing" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-body">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" checked>
                                        ALL
                                        <span class="form-check-sign"></span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="">
                                        2018
                                        <span class="form-check-sign"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card -->
            </div>
            <div class="col-md-9">
                <h4 class="title">Lihat Hasil Voting</h4>
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
                            </tr>
                        </thead>
                        <tbody data-link="row" class="rowlink">
                            @foreach ($pemilu as $i => $p)
                            <tr class="text-center">
                                <td><a href="{{ route('result.show', $p->id)}}"></a>{{ $i+1 }}</td>
                                <td>
                                    <img src="{{ asset ('logo') }}/{{ $p->logo }}" width="30px" height="30px"/>
                                </td>
                                <td>{{ $p->tema_pemilu }}</td>
                                <td>{{ $p->penyelenggara }}</td>
                                <td>{{ $p->periode }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
