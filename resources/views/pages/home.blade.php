@extends('layouts.app')


@section('content')

	@include('errors.list')
	@if(count($posts))

		@foreach($posts as $post)
			<div class="well">
				<div class="media">
					<div class="media-heading">
						<h3><a href="{{ action('ForumController@viewPost',$post->slug) }}">{{ $post->title }}</a></h3>
						<p class="text-right">By: {{ $post->user->name }}</p>
						<p>{{ $post->body }}</p>
						<ul class="list-inline list-unstyled">
							<li>
								<span>
									<i class="glyphicon glyphicon-calendar"></i>
									{{ $post->created_at->diffforHumans() }}
								</span>
							</li>
							<li>|</li>
							<li>
								@if($post->replies->count() > 0)
									<li>{{ $post->replies->count() }} comment(s)</li>
								@else
									<p>Be the first to Reply</p>
								@endif
							</li>
						</ul>
						
						@if(Auth::user()->id == $post->user_id || Auth::user()->admin > 0)
							<div class="pull-right">	
								<a href="{{ action('ForumController@editPost',$post->id) }}" class="btn btn-success ">Edit</a>
								<a href="{{ action('ForumController@deletePost',$post->id) }}" class="btn btn-danger">Delete</a>
							</div>
						@endif
					
					</div>
				</div>
			</div>

		@endforeach

	@else
		<p>No posts Found</p>

	@endif

	{{ $posts->appends(Request::all())->render() }}
 

@endsection

