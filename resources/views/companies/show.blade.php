@extends('layouts.master')

@section('content')

	<div class="container">
		<div class="col-md-10 question">
			<div class="row">

			</div>

			<h2 class="heading">{{auth()->user()->company->name}}</h2>
			<hr>
				<form action="/{{auth()->user()->company->id}}/company/search" method="GET">
					{{ csrf_field() }}
					<input type="text" name="search" placeholder="Search Question...">
					<button type="submit" class="btn btn-primary">Search</button>
				</form>
			<hr>

			@foreach ($questions as $question)
				<div class="row question">

					<div class="col-md-2">
						<div class="square">
							<p>{{$question->rating}}</p>
							<small>rating</small>
						</div>
						<div class="square">
							<p>{{count($question->answers)}}</p>
							<small>answers</small>
						</div>
						<div class="square">
							<p>{{$question->views}}</p>
							<small>views</small>
						</div>
					</div>

					<div class="col-md-10">
						<h4><a class="text-dark" href="/{{$question->company_id}}/question/{{$question->id}}" title="">{{$question->name}}</a></h4>
						{{-- <p class="questionBody">{{ html_entity_decode($question->body)}} </p> --}}
						<div class="questionBody">
						 	<?= $question->body ?>
						</div>

						<div class="row">
							<div class="col-md-8">
								<span class="tag"><small>PHP</small></span> <span class="tag"><small>CSS</small></span> <span class="tag"><small>JS</small></span>
							</div>
							<div class="col-md-4 name">
								<p><small>{{$question->created_at}}</small></p>
								<p><small>{{$question->user->name}}</small></p>
							</div>
						</div>
					</div>

				</div>
				<hr>
			@endforeach
		</div>

	</div>

@endsection
