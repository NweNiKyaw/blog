@extends ('layouts.app')

@section('content')
<div class="container">
	<h1>App Post</h1>
	@if($errors->any())
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				{{"$error"}}<br>	
			@endforeach
		</div>
	@endif
	<form method="post">
		{{ csrf_field()}}	
		<div class="form-group">
			<label>	Title</label>
			<input type="text" name="title" class="form-control">
		</div>
		<div class="form-group">
			<label>Body</label>
			<textarea name="body" class="form-control">	</textarea>
		</div>
		<div class="form-group">
			<label>Category</label>
			<select name="category_id" class="form-control">
				@foreach($categories as $category)
					<option value="{{$category->id}}">
						{{ $category->name}}
					</option>
				@endforeach
			</select>
		</div>
		<input type="submit" Value="Add Post" class="btn btn-primary">
	</form>
</div>
@endsection