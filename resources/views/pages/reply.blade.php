@extends('layouts.app')


@section('content')


	<div class="well">
		<div class="media">
			<div class="media-body">
				<h4 class="media-heading">{{ $post->title }}</h4>
				<p class="text-right">{{ $post->user->name }}</p>
				<p>{{ $post->body }}</p>
				<ul class="list-inline list-unstyled">
					<li>
						<span>
							<i class="glyphicon glyphicon-calendar"></i>
							{{ $post->created_at->diffforHumans() }}
						</span>
					</li>
				</ul>
				
			</div>
		</div>

	</div>


	@forelse($post->replies as $reply)

		<div class="well">
			<div class="media">
				<div class="media-body">
						<p class="text-right">{{ $reply->user->name }}</p>
						<p>{{ $reply->body }}</p>
						<ul class="list-inline list-unstyled">
							<li>
								<span>
									<i class="glyphicon glyphicon-calendar"></i>
									{{ $reply->created_at->diffforHumans() }}
								</span>
							</li>
						</ul>
						@if(Auth::user()->id == $post->user_id || Auth::user()->admin > 0)
							<div class="pull-right">	
								<button href="{{ action('ForumController@editReply',$reply->id) }}" class="btn btn-success" data-toggle="modal" data-target="#myModal">
	  								Edit
								</button>
							
								<a href="{{ action('ForumController@deleteReply',$reply->id) }}" class="btn btn-danger">
									Delete
								</a>
		
							</div>
						@endif
						
				</div>
			</div>
		</div>



	@empty

		<p>Be the first to reply</p>

	@endforelse


	@include('errors.list')

	<form action="{{ action('ForumController@saveReply') }}" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="slug" value="{{ $post->slug }}">
		<div class="form-group">
			<label>Write a comment</label>
			<br>
			<textarea class="form-control" name="body"></textarea>
			<br>
			<button type="submit" class="btn btn-lg btn-primary">Post</button>
		</div>
	</form>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Edit Comment</h4>
	      </div>
	      @foreach($post->replies as $reply)
	      <form action="{{ action('ForumController@updateReply',$reply->id) }}" method="POST">
		      <div class="modal-body">
		        		{{ csrf_field() }}
		        		<div class="form-group">	
		        			<textarea class="form-control" name="body">{{ $reply->body }}</textarea>
		        		</div>
		        		<button class="btn btn-success">Edit</button>			
		      </div>
	       </form>
		      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        

		      </div>
	       @endforeach
	    </div>
	  </div>
	</div>

	<script type="text/javascript">
		$('#myModal').modal('show');
	</script>


@endsection