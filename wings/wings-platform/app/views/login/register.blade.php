@extends('layouts.default')
@section('content')
{{ Form::open(array('url'=>'login/create', 'files' => true, 'class'=>'form-signup')) }}
    <h2 class="form-signup-heading">Please Register</h2>

    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

<p>
    {{ Form::label('First_name', 'First name:*') }}
    {{ Form::text('First_name', null, array('placeholder'=>'First Name')) }}
</p>
<p>
    {{ Form::label('Last_name', 'Last name:*') }}
    {{ Form::text('Last_name', null, array('placeholder'=>'Last Name')) }}
</p>
<p>
    {{ Form::label('Email', 'Email:*') }}
    {{ Form::text('Email', null, array('placeholder'=>'Email Address')) }}
</p>
<p>
    {{ Form::label('Password', 'Password:*') }}
    {{ Form::password('Password', array('placeholder'=>'Password')) }}
</p>
<p>
    {{ Form::label('Password_confirmation', 'Confirm Password:*') }}
    {{ Form::password('Password_confirmation', array('placeholder'=>'Confirm Password')) }}
</p>
<p>
    {{ Form::label('Biography', 'Biography:') }}
    {{ Form::textarea('Biography', null, array('placeholder'=>'Biography')) }}
</p>
<p>
    {{ Form::label('Profession', 'Profession:') }}
    {{ Form::text('Profession', null, array('placeholder'=>'Profession')) }}
</p>
<p>
    {{ Form::label('Picture', 'Picture:') }}
    {{ Form::file('Picture') }}
</p>
<p>
    {{ Form::label('LinkedIn', 'LinkedIn:') }}
    {{ Form::text('LinkedIn', null, array('placeholder'=>'LinkedIn')) }}
</p>
<p>
    {{ Form::label('Website', 'Website:') }}
    {{ Form::text('Website', null, array('placeholder'=>'Website')) }}
</p>
<p>
    {{ Form::label('Mentor', 'Mentor:') }}
    {{ Form::checkbox('Mentor', 'Mentor') }}
</p>
<p>
    {{ Form::label('Country', 'Country:') }}
    {{ Form::select('Country', $countries, Input::old('Country')) }}
</p>
<p>
    {{ Form::submit('Register', array()) }}
</p>

{{ Form::close() }}

@stop