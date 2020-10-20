@extends('layouts.admin')

@section('title')
<title>Create New Page</title>
@stop

@section('content')

@include('partials.cancellink')

<h2>Create New Page</h2>
<hr>
<form method="POST" action="/node" accept-charset="UTF-8" novalidate>
  <input name="_method" type="hidden" value="POST">
  {{csrf_field()}}
  <div class="form-group">
    <label for="parent">Parent Page</label>
    <select class="form-control" id="parent" name="parent_id">
      @foreach ($parents as $parent)
      @if (is_array($parent))
      <option 
      value={{$parent['id']}} 
      @if ($parent['id'] == old('parent_id'))) selected @endif
      >
      {{$parent['name']}}</option>
      @else
      <option disabled>──────────────</option>
      @endif
      @endforeach
    </select>
    <p>This will be the section where the page will be.</p>

  </div>
  @include('nodes._form')

  <button type="submit" class="btn btn-default">Submit</button>

  @include('partials.scratchpad')

  @include('tinyMCEScript', ['selector' => '#content', 'uploadImage' => false])

</form>

@stop