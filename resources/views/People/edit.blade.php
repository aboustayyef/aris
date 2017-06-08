<?php 
$now = new Carbon\Carbon;
?>

@extends('layouts.admin')

@section('content')

@include('partials.cancellink')

<h2>Edit Person</h2>
<hr>

<form method="POST" action="/people/{{$person->id}}" accept-charset="UTF-8">
	<input name="_method" type="hidden" value="PUT">

@include('People._form')

<button type="submit" class="btn btn-default">Update</button>

<!-- Destroy button -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
  Delete Person
</button>
</form>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
      </div>
      <div class="modal-body">
        <p>This will permanently delete this person</p>
        <form method="POST" action="/people/{{$person->id}}?from={{request()->get('from')}}" accept-charset="UTF-8">
			<input name="_method" type="hidden" value="DELETE">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
		    <button class="btn btn-primary" data-dismiss="modal">Go Back</button>
		    <button type="submit" class="btn btn-danger btn-mini">Delete This Person</button>
		</form>

      </div>
    </div>
  </div>
</div>


@include('partials.scratchpad')

@include('tinyMCEScript', ['selector' => '#bio', 'uploadImage' => false])

@stop