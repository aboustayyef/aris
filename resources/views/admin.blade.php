@extends('layouts.admin')
@section('content')

<div class="page-header">
	<p class="lead">Management dashboard for News And Pages</p>
</div>
<div class="row">
	<div class="col-md-8">
		<h2>Pages</h2>
		<a href="/node/create?from=admin" class="btn btn-warning btn-lg">Create A New Page in The Website</a>
		<hr>
		<h2>News <a class="btn btn-warning" href="/news/create/?from=admin">Create Story</a></h2>
		<table class="table">
			<caption>
				Listed are the 15 latest stories. To see more, go to the <a href="/news">news</a> page.
			</caption>
			<thead>
				<tr>
					<th>Title</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($news as $story)
					<tr>
						<td>{{$story->title}}</td>
						<td><a href="/news/{{$story->id}}/edit?from=admin" class="btn btn-primary btn-xs">edit story</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	{{-- <div class="col-md-4">
		<h2>People <a class="btn btn-warning" href="/people/create/?from=admin">Create Person</a></h2>
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#faculty" aria-controls="faculty" role="tab" data-toggle="tab">Faculty</a></li>
		    <li role="presentation"><a href="#admin" aria-controls="admin" role="tab" data-toggle="tab">Administration</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="faculty">
	    		<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($faculty as $member)
							<tr>
								<td>{{$member->lastname}}, {{$member->firstname}}</td>
								<td><a href="/people/{{$member->id}}/edit?from=admin" class="btn btn-primary btn-xs">edit</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="admin">
		    	<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($admin as $member)
							<tr>
								<td>{{$member->lastname}}, {{$member->firstname}}</td>
								<td><a href="/people/{{$member->id}}/edit?from=admin" class="btn btn-primary btn-xs">edit</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
		    </div>
		  </div>
	</div> --}}
</div>
@stop