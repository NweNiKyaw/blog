@extends ('layouts.app')

@section('content')
<div class="container">
	<h1>App Post</h1>
		<form method="post">
		{{ csrf_field()}}	
			<div class="form-group">
				<label>	Title</label>
				<input type="text" name="title" class="form-control" value="{{ $post ->title}}">
			</div>
			<div class="form-group">
				<label>Body</label>
				<textarea name="body" class="form-control">{{ $post -> body}}</textarea>
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
			<input type="submit" Value="Update Post" class="btn btn-primary">
		</form>
</div>
@endsection