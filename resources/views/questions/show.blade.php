@extends("layouts.master")

@section("content")
	<div class="container">
		<div class="row">
			<div class="questionarea col-md-10">
				<h2 class="heading">{{auth()->user()->company->name}}</h2>
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

							<div class="r">
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

						<div class="questionName">
						 	<h4>{{ $question->name }}</h4>
						</div>

						<div class="questionBody">
						 	{{ $question->body }}
						</div>

						<div>
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

		<div class="row">
			<div class="comments col-md-12">
				@foreach ($question->comments as $comment)
					<div class="card mb-1 text-white bg-secondary">
					  <div class="card-body">
					    <p class="card-text">{{$comment->body}}</p>
					    <p class="card-text"> by {{$comment->user->name}} at {{$comment->created_at}}</p>
					  </div>
					</div>
				@endforeach
			</div>
		</div>

		<hr>

		<div class="row">
			<form action="/{{$question->company_id}}/question/comment" method="POST">
				{{csrf_field()}}
				<input type="hidden" name="question_id" value={{$question->id}}>

			    <div class="form-group">
			      <input name='body' type="text" class="form-control"  placeholder="Add comment..">
			    </div>

			    <button type="submit" class="btn btn-primary">Add comment</button>

			</form>

		</div>


		<hr>

		<div class="row">

			@foreach ($question->answers as $answer)
			  	<div class="card mb-1 text-white bg-secondary">
				  <div class="card-body">
				    <p class="card-text">{{$answer->body}} by {{$answer->user->name}} at  {{$answer->created_at}}</p>
				  </div>
				</div>
		  @endforeach

		 </div>

		 <div class="row">

		  <form class="mb-5" action="/{{$question->company_id}}/answers" method="POST">
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
