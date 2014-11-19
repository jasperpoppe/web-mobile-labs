@extends('layouts.default')
@section('content')
	<h2>Good practices</h2>
    @foreach ($good_practices as $gp)
        <div class="row">
            <p>{{ $gp->ID }}: {{ $gp->Project_name }}</p>
            <p>{{ $gp->Services }}</p>
            <p>
                @foreach ($gp->Services() as $service)
                    <span>{{ $service->Good_Practices_ID }} and {{ $service->Services_ID }}</span>
                @endforeach
            </p>
            <p><a href="/admin/good_practices/edit">Edit</a> | <a href="/admin/good_practices/delete">Delete</a></p>
        </div>
    @endforeach
@stop