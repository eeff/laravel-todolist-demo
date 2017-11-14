@extends('layout.app')

@section('content')
	@include('utils.message')
    <a class="btn btn-default" href="/">Go Back</a>
    <h1 class="text-center">{{$todo->title}}</h1>
    <div><sapn class="label label-danger">{{$todo->due}}</span></div>
    <p class="lead">{{$todo->body}}</p>
    <a href='/todo/{{$todo->id}}/edit' class="btn btn-default">Edit</a>
    <form action="/todo/{{$todo->id}}" method="POST">
		{{ csrf_field() }}
    	{{ method_field('DELETE') }}
    	<button type="submit" class="btn btn-danger pull-right">Delete</button>
    </form>
@endsection
