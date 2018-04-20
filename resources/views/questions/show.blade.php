@extends("layouts.master")

@section("content")
	<div class="container">
		<div class="row">
			<div class="question col-md-10">
				<h2 class="heading">{{auth()->user()->company->name}}</h2>
				<hr>

				@foreach($questions as $question)
					<a href="/{{$question->company_id}}/question/{{$question->id}}" title="">{{$question->name}}</a>
					<div class="questionBody">
					 	{{ $question->body }}
					</div>

					<div>
							<p><small>{{$question->created_at}}</small></p>
							<p><small>{{$question->user->name}}</small></p>
					</div>

				@endforeach
			</div>
		</div>
	</div>
@endsection
