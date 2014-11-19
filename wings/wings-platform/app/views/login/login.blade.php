@extends('layouts.default')
@section('content')

{{ Form::open(array('url'=>'login/signin', 'id'=>'login-form', 'class'=>'form-signin')) }}
    <h2 class="form-signin-heading">Please Login</h2>

    {{ Form::text('Email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
    {{ Form::password('Password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}

    {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}
@stop