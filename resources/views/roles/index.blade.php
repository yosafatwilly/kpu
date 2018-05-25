@extends('layouts.app_section')
@section('title', 'Roles')
@section('content')
<div class="section section-white">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mr-auto ml-auto">
                <h4 class="title">Roles</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <td><strong>Role</strong></td>
                                <td><strong>Permissions</strong></td>
                                <td><strong>Operation</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr class="text-center">
                                <td>{{ $role->name }}</td> 
                                <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
                                <td class="td-actions">
                                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}" accept-charset="UTF-8">
                                        <input name="_method" type="hidden" value="DELETE">
                                        {{ csrf_field() }}
                                        <a href="{{ URL::to('roles/'.$role->id.'/edit') }}">
                                            <button type="button" data-toggle="tooltip" data-placement="top" title data-original-title="Edit" class="btn btn-success btn-link btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <button type="submit "data-toggle="tooltip" data-placement="top" title data-original-title="Remove" class="btn btn-danger btn-link btn-sm">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="row buttons-row">
                    <div class="col-md-4 col-sm-4" style="margin-bottom: 10px">
                        <a href="{{ URL::to('roles/create') }}" class="btn btn-outline-default btn-block btn-round"> Add Roles</a>
                    </div>
                    <div class="col-md-4 col-sm-4" style="margin-bottom: 10px">
                        <a href="{{ route('permissions.index') }}" class="btn btn-outline-danger btn-block btn-round">Permissions</a>
                    </div>
                    <div class="col-md-4 col-sm-4" style="margin-bottom: 10px">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-primary btn-block btn-round" style="submit">User</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
