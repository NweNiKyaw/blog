@extends('layouts.app')

@section('content')

<div class="container">

	@if(session('danger'))
		<div class="alert alert-danger">
			{{ session ('danger')}}
		</div>
	@endif

	@foreach($posts as $post)
		<div class="panel panel-warning">
			<div class="panel-heading">
				<a href="{{url("/posts/view/$post->id") }}">{{$post->title}}</a>
					<!-- {{$post->id}} -->
			</div>
			<div class="panel-body">
				<h4>{{ $post->body}}</h4>
			</div>
			<div class="panel-footer">
				<b>{{ $post -> category->name}}</b>,
				{{ $post->created_at->diffForHumans()  }},
				{{ count($post->comments)}} comments
			</div>
		</div>
	@endforeach

	{{$posts->links()}}

</div>
@endsection