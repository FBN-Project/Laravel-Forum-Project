@extends('layouts.app')

@section('content')



	{!! Form::model($post,['route' => ['post.update',$post->id] , 'method' => 'POST']) !!}

	{!! Form::label('title','Title') !!}
	{!! Form::text('title',null,['name' => 'title','class' => 'form-control']) !!}

	{!! Form::label('category','Category') !!}
	<select name="category_id" class="form-control">
			@foreach($categories as $category)
				@if($post->category_id == $category->id)
				<option value="{{ $category->id }}" selected>{{ $category->name }}</option>
				@else
				<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endif


			@endforeach
	</select>
	<br>
	{!! Form::label('body','Body') !!}
	{!! Form::textarea('body',null,['name' => 'body','class' => 'form-control']) !!}
	<br>

	{!! Form::button('Edit Post',['type' => 'submit','class' => "btn btn-success btn-block form-control" ]) !!}
	{!! Form::close() !!}

	@include('errors.list')

@stop
