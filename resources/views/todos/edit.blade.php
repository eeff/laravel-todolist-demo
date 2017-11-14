@extends("layout.app")

@section('content')
	<h1 class="text-center">Edit Todo</h1>
	@include('utils.message')
    <a href="/todo/{{$todo->id}}" class="btn btn-default">Go Back</a>
	<form action="/todo/{{$todo->id}}" method="POST" role="form">
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" class="form-control form-control-sm" type="text" id="title" placeholder="Enter title"
                   value="{{ count($errors) ? old('title') : $todo->title }}">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" class="form-control" id="body" rows="3">{{ count($errors) ? old('body') : $todo->body }}</textarea>
        </div>
        <div class="form-group">
            <label for="due">Due</label>
            <input name="due" class="form-control form-control-lg" type="text" id="due" placeholder="When to due"
                   value="{{ count($errors) ? old('due') : $todo->due }} ">
            <small class="form-text text-muted">Time to Due!</small>
		{{ csrf_field() }}
        {{ method_field('PUT') }}
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@endsection