@extends('layouts.app')

@section('content')

	<form action="{{ action('ForumController@postQuestion') }}" method="POST">
		{{ csrf_field() }}

		@include('errors.list')

		<div class="form-group">
			<label>Title</label>
			<input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Write a Title">
		</div>

		<div class="form-group">
			<label>Category</label>
			<select class="form-control" name="category">
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label>Body</label>
			<textarea name="body" class="form-control"  rows="10" cols="5">
			</textarea>
		</div>

		<button type="submit" class="btn btn-lg btn-primary">Post</button>

	</form>




@endsection