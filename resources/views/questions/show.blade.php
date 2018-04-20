@extends("layouts.master")

@section("content")
	<div class="container">

		<div class="row">
			<div class="questionarea col-md-12">
				<div class="companyName">
				 	<h2>{{ $question->name }}</h2>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-1 rating">

						<div class="like">
							<form action="/{{auth()->user()->company->id}}/question/{{$question->id}}/like" method="POST">
								{{csrf_field()}}
								{{method_field("PATCH")}}
								<button class="btn btn-primary" type="submit">
									<i class="fas fa-arrow-up"></i>
								</button>
							</form>
						</div>

						<div class="r text-center">
							{{ $question->rating }}
						</div>

						<div class="dislike">
							<form action="/{{auth()->user()->company->id}}/question/{{$question->id}}/dislike" method="POST">
								{{csrf_field()}}
								{{method_field("PATCH")}}

								<button type="submit" class="btn btn-primary">
									<i class="fas fa-arrow-down"></i>
								</button>

							</form>
						</div>
					</div>

					<div class="col-md-9 question">

						<div class="">
						   <?= $question->body ?>
						</div>

						<div class="ml-auto">
								<p><small>{{$question->created_at}}</small></p>
								<p><small>{{$question->user->name}}</small></p>
						</div>

					</div>

					<div class="col-md-2 controls">
						<div class="row">
							<div class="col-md-6">

								<form action="/{{auth()->user()->company->id}}/question/{{ $question->id }}/edit" method="GET">

									{{csrf_field()}}
									<button type="submit" class="btn btn-primary">Edit</button>
								</form>

							</div>

							<div class="col-md-6">

								<form action="/{{auth()->user()->company->id}}/question/{{ $question->id }}/delete" method="POST">
									{{ csrf_field() }}
									{{ method_field("DELETE") }}
									<button type="submit" class="btn btn-danger">Delete</button>
								</form>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	<hr>

	<div class="row">
		<div class="comments col-md-9 push-2">
			@foreach ($question->comments as $comment)
				  	<blockquote class="blockquote">
						<p class="mb-0">{{$comment->body}}</p>
						<footer class="blockquote-footer">{{$comment->user->name}} at <cite title="Source Title">{{$comment->created_at}}</cite></footer>
					</blockquote>
			@endforeach
		</div>
	</div>



		<div class="row">
			<form class="form-inline" action="/{{$question->company_id}}/question/comment" method="POST">
				{{csrf_field()}}
				<input type="hidden" name="question_id" value={{$question->id}}>

			    <div class="form-group">
			      <input name='body' type="text" class="form-control"  placeholder="Add comment..">
			    </div>

			    <button type="submit" class="btn btn-primary ml-3">Add comment</button>

			</form>

		</div>


		<hr>
			<h2 class="companyName m-4">Answers:</h2>

			@foreach ($question->answers as $answer)
			  	<div class="row">
				  	<div class="card mb-4">
						  <div class="card-body">
						    <p class="card-text">{{$answer->body}} by {{$answer->user->name}} at  {{$answer->created_at}}</p>
						  </div>
					</div>

				</div>

					@foreach ($answer->comments as $comment)
					  	<div class="row">
						  	<blockquote class="blockquote">
								  <p class="mb-0">{{$comment->body}}</p>
								  <footer class="blockquote-footer">{{$comment->user->name}} at <cite title="Source Title">{{$comment->created_at}}</cite></footer>
							</blockquote>



						</div>
			  		@endforeach



		  		<div class="row">
					<form class="form-inline" action="/{{$question->company_id}}/answer/comment" method="POST">
						{{csrf_field()}}
						<input type="hidden" name="answer_id" value={{$answer->id}}>

					    <div class="form-group">
					      <input name='body' type="text" class="form-control"  placeholder="Add comment to answer..">
					    </div>

					    <div class="form-group">
					    	<button type="submit" class="btn btn-primary ml-3">Add comment to answer</button>
					    </div>

					</form>
				</div>

				<hr>

		  @endforeach



		 <div class="row">

		  <form class="mb-5 form-inline" action="/{{$question->company_id}}/answers" method="POST">
			    {{csrf_field()}}
				<input type="hidden" name="question_id" value={{$question->id}}>

			    <div class="form-group">
			      <input name='body' type="text" class="form-control"  placeholder="Add Answer">
			    </div>
			    <button type="submit" class="btn btn-primary">Add Answer</button>

		  </form>

		   </div>




		</div>

@endsection
