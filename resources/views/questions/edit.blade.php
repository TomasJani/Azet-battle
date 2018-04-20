@extends("layouts.master")

@section("content")

	<div class="container">
		<form action="/{{auth()->user()->company_id}}/question/{{ $question->id }}" method="POST">

		    {{csrf_field()}}
		    {{method_field("PATCH")}}

		    <div class="form-group">
		        <label>Name</label>
		        <input name='name' type="text" class="form-control" value="{{$question->name}}">
		    </div>

		    <div class="form-group">
		        <label>Body</label>
		        <textarea name="body" value="{{$question->body}}" class="form-control">
					{{$question->body}}
		        </textarea>
		    </div>

		    <div class="form-group">
		        <label>Tags</label>
		        <input value="{{$question->tags}}" name="tags" type="text" class="form-control"  placeholder="Tags">
		    </div>

		    <button type="submit" class="btn btn-peach">Edit</button>

		  </form>

	</div>

@endsection











