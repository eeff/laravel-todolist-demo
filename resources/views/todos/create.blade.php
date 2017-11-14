@extends("layout.app")

@section('content')
	<h1 class="text-center">Create A Todo</h1>
	@include('utils.message')
	<form action="/todo" method="POST" role="form">
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" class="form-control form-control-sm" type="text" id="title" placeholder="Enter title"
            	   value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" class="form-control" id="body" rows="3">{{ old('body') }}</textarea>
        </div>
        <div class="form-group">
            <label for="due">Due</label>
            <input name="due" class="form-control form-control-lg" type="text" id="due" placeholder="When to due"
            	   value="{{ old('due') }}">
            <small class="form-text text-muted">Time to Due!</small>
		{{ csrf_field() }}
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@endsection