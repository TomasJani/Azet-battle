@extends('layouts.master')

@section('content')
	<div class="container">
		@if (auth()->user() and (auth()->user()->company_id != 0))
			<div class="row">
				<div class="col-sm-12">
					<h3>{{auth()->user()->company->name}}</h3>
					<hr>
					<div class="row">
						<div class="col-sm-6 text-center mb-2 mt-3">
							<p>Creator: {{auth()->user()->name}}</p>
						</div>

						<div class="col-sm-6 text-center mb-2 mt-3">
							<p>Unique key: {{auth()->user()->company->unique_key}}</p>
						</div>
					</div>
				<hr>
				</div>
			</div>
		@endif

		<div class="row">

			<div class="col-sm-6">
				<h3 class="text-center">Create Company</h3>
				<form action="/company" method="POST">
				  @method('PATCH')
				  {{csrf_field()}}

				  <div class="form-group">
				    <label>Name</label>
				    <input name='name' type="text" class="form-control" placeholder="Name">
				  </div>

				  <button type="submit" class="btn btn-peach">Create</button>

				</form>
			</div>

			<div class="col-sm-6">
				<h3 class="text-center">Log Into Company</h3>
				<form action="company/login" method="POST">
			      @method('PATCH')
				  {{csrf_field()}}

				  <div class="form-group">
				    <label>Name</label>
				    <input name='name' type="text" class="form-control" placeholder="Name">
				  </div>

				  <div class="form-group">
				    <label>Unique Key</label>
				    <input name='unique_key' type="text" class="form-control"  placeholder="Unique Key">
				  </div>

				  <button type="submit" class="btn btn-peach">LogIn</button>

				</form>
			</div>
		</div>

	</div>
@endsection

