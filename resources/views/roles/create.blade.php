@extends('layouts.app_section')
@section('title', 'Add Roles')
@section('content')
<div class="section section-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
                <h4 class="title">Add Roles</h4>
                {{ Form::open(array('url' => 'roles')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                <h5><b>Assign Permissions</b></h5>

                <div class='form-group'>
                    @foreach ($permissions as $permission)
                    {{ Form::checkbox('permissions[]',  $permission->id ) }}
                    {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

                    @endforeach
                </div>

                {{ Form::submit('Add', array('class' => 'btn btn-danger btn-round')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
