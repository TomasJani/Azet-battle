@extends("layouts.master")

@section("content")

<div class="container">
	<form action="/{{auth()->user()->company_id}}/question/create" method="POST">

	    {{csrf_field()}}

	    <div class="form-group">
	        <label >Name</label>
	        <input name='name' type="text" class="form-control" placeholder="Name">
	    </div>

	    <div class="form-group">
	        <label>Body</label>
	        <textarea name="body" class="form-control">Next, start a free trial!</textarea>
	    </div>

	    <div class="form-group">
	        <label>Tags</label>
	        <input name="tags" type="text" class="form-control"  placeholder="Tags">
	    </div>

	    <button type="submit" class="btn btn-peach">Create</button>

	  </form>

</div>


@endsection
