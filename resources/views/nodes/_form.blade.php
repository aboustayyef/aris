
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	<label for="name" class="control-label">Title</label>
	<input class="form-control" name="name" type="text" id="name" value="{{old('name', $node->name)}}">
	<small class="text-danger">{{ $errors->first('name') }}</small>
</div>

<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
	<label for="content">Content</label>
	<input id="content" name="content" type="text" value="{{ old('content', htmlentities($node->content)) }}">
	<small class="text-danger">{{ $errors->first('content') }}</small>
</div>

<input type="hidden" name="from" value ="{{request()->get('from')}}">
