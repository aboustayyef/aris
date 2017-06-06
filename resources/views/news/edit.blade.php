@extends('layouts.admin')

@section('title')
	<title>Edit Story</title>
@stop

@section('content')

<form method="POST" action="/news/{{$news->id}}" accept-charset="UTF-8" novalidate>
	<input name="_method" type="hidden" value="PUT">
	{{csrf_field()}}
	
	@include('news._form')

<button type="submit" class="btn btn-default">Submit</button>

@include('partials.scratchpad')

@include('tinyMCEScript', ['selector' => '#content', 'uploadImage' => false])

</form>

<!-- Destroy button -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
  Delete Post
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
      </div>
      <div class="modal-body">
        <p>This will permanently delete this post</p>
        <form method="POST" action="/news/{{$news->id}}?from={{$request->get('from')}}" accept-charset="UTF-8">
			<input name="_method" type="hidden" value="DELETE">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
		    <button class="btn btn-primary" data-dismiss="modal">Go Back</button>
		    <button type="submit" class="btn btn-danger btn-mini">Delete This Post</button>
		</form>

      </div>
    </div>
  </div>
</div>

<script>
</script>

@stop