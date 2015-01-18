@extends('layouts.main')

@section('content')
<div class="inner">

	@include('partials.breadcrumbs')

	<div id="content-area">
		<h2>{{$node->name}}</h2>
		{{$node->content}}
        @if(Auth::Check())
                <?php $lastEdited = $node->updated_at->format('d M Y, H:i'); ?>
                <p class="meta">Page last edited by {{$node->last_edited_by}} on {{$lastEdited}} | <a href="/pages/{{$node->id}}/edit">Edit This Page</a> (Only admins can see this)</p>
        @endif
	</div>

	@include('partials.sidebar')

</div>

@stop