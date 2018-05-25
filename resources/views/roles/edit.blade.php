@extends('layouts.app_section')
@section('title', 'Edit Role - '.$role->name)
@section('content')
<div class="section section-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
                <h4 class="title">Edit Role: {{$role->name}}</h4>
                {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Role Name') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                <h5><b>Assign Permissions</b></h5>
                @foreach ($permissions as $permission)

                {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

                @endforeach
                <br>
                {{ Form::submit('Edit', array('class' => 'btn btn-danger btn-round')) }}

                {{ Form::close() }}    
            </div>
        </div>
    </div>
</div>
@endsection
