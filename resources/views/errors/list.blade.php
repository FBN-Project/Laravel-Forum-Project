@if($errors->any())
	<div id="form-errors" class="alert alert-danger">

		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>

	</div>
@endif

@if(Session::has('post_delete'))
	<div id="form-errors" class="alert alert-success flash">
		<p>{{ Session::get('post_delete') }}</p>
	</div>
@endif


@if(Session::has('post_edit'))
	<div id="form-errors" class="alert alert-success flash">
		<p>{{ Session::get('post_edit') }}</p>
	</div>
@endif

