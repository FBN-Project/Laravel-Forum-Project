@extends('layouts.app')


@section('content')

	<p>Total Question {{ $user->posts->count() }}</p>
	<p>Total Reply {{ $user->replies->count() }}</p>


@stop