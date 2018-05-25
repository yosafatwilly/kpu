@extends('layouts.app_section')

@section('title', 'Add Permission')

@section('content')
<div class="section section-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
                <h4 class="title">Add Permissions</h4>
                {{ Form::open(array('url' => 'permissions')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                </div><br>
                @if(!$roles->isEmpty())
                <h4 style="margin-top: -10px">Assign Permission to Roles</h4>
                @foreach ($roles as $role) 
                {{ Form::checkbox('roles[]',  $role->id ) }}
                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                @endforeach
                @endif
                <br>
                {{ Form::submit('Add', array('class' => 'btn btn-danger btn-round')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
