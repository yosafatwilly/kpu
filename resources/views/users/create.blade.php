@extends('layouts.app_section')
@section('title', 'Add User')
@section('content')
<div class="section section-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
                <h4 class="title">Add User</h4>
                {{ Form::open(array('url' => 'users')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', '', array('class' => 'form-control')) }}
                </div>

                <div class='form-group'>
                    @foreach ($roles as $role)
                    {{ Form::checkbox('roles[]',  $role->id ) }}
                    {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                    @endforeach
                </div>

                <div class="form-group">
                    {{ Form::label('password', 'Password') }}<br>
                    {{ Form::password('password', array('class' => 'form-control')) }}

                </div>

                <div class="form-group">
                    {{ Form::label('password', 'Confirm Password') }}<br>
                    {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

                </div>

                {{ Form::submit('Add', array('class' => 'btn btn-danger btn-round')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
