@extends('layouts.app_section')
@section('title', 'Users')
@section('content')
<div class="section section-white">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mr-auto ml-auto">
                <h4 class="title">Users</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <td><strong>Name</strong></td>
                                <td><strong>Email</strong></td>
                                <td><strong>Date/Timed Added</strong></td>
                                <td><strong>User Roles</strong></td>
                                <td><strong>Operations</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="text-center">
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                                <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>
                                <td class="td-actions">
                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}" accept-charset="UTF-8">
                                        <input name="_method" type="hidden" value="DELETE">
                                        {{ csrf_field() }}
                                        <a href="{{ route('users.edit', $user->id) }}">
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
                        <a href="{{ route('users.create') }}" class="btn btn-outline-default btn-block btn-round"> Add User</a>
                    </div>
                    <div class="col-md-4 col-sm-4" style="margin-bottom: 10px">
                        <a href="{{ route('permissions.index') }}" class="btn btn-outline-danger btn-block btn-round">Permissions</a>
                    </div>
                    <div class="col-md-4 col-sm-4" style="margin-bottom: 10px">
                        <a href="{{ route('roles.index') }}" class="btn btn-outline-primary btn-block btn-round" style="submit">Roles</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
