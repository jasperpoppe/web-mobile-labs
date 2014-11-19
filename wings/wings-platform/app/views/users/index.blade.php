@extends('layouts.default')
@section('content')
	<h2>Hello {{ $user->firstname }}</h2>
	<p>You are on the users page!</p>
@stop