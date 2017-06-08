<?php 
$now = new Carbon\Carbon;
?>

@extends('layouts.admin')

@section('content')

@include('partials.cancellink')

<h2>Create New Person</h2>
<hr>

<form method="POST" action="/people/{{$person->id}}" accept-charset="UTF-8">

@include('People._form')

<button type="submit" class="btn btn-default">Submit</button>

@include('partials.scratchpad')

@include('tinyMCEScript', ['selector' => '#bio', 'uploadImage' => false])

@stop