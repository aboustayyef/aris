{{csrf_field()}}

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	<label for="title" class="control-label">Title: (Mr. , Ms. , Dr. , Prof.)</label>
	<input class="form-control" name="title" type="text" id="title" value="{{old('title', $person->title)}}">
	<small class="text-danger">{{ $errors->first('title') }}</small>
</div>
<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
	<label for="firstname" class="control-label">Firstname: </label>
	<input class="form-control" name="firstname" type="text" id="firstname" value="{{old('firstname', $person->firstname)}}">
	<small class="text-danger">{{ $errors->first('firstname') }}</small>
</div>
<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
	<label for="lastname" class="control-label">Lastname: </label>
	<input class="form-control" name="lastname" type="text" id="lastname" value="{{old('lastname', $person->lastname)}}">
	<small class="text-danger">{{ $errors->first('lastname') }}</small>
</div>

<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
	<label for="type" class="control-label">Position (You can pick more than one)</label>
	<div><input type="checkbox" name="type[]" value="Administration" 
		@if((strstr($person->type, 'Administration') || @in_array('Administration', old('type'))))
			checked="checked"
		@endif
	> Administration</div>
	<div><input type="checkbox" name="type[]" value="Faculty"
		@if((strstr($person->type, 'Faculty') || @in_array('Faculty', old('type'))))
			checked="checked"
		@endif
	> Faculty</div>
	<div><input type="checkbox" name="type[]" value="Staff"
		@if((strstr($person->type, 'Staff') || @in_array('Staff', old('type'))))
			checked="checked"
		@endif
	 > Staff</div>
	 <small class="text-danger">{{ $errors->first('type') }}</small>
</div>

<div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
	<label for="designation" class="control-label">Designation: (Description of what they do) </label>
	<input class="form-control" name="designation" type="text" id="designation" value="{{old('designation', $person->designation)}}">
	<small class="text-danger">{{ $errors->first('designation') }}</small>
</div>

<div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
	<label for="department" class="control-label">Department: (Example: Foundation, Primary.. etc) </label>
	<input class="form-control" name="department" type="text" id="department" value="{{old('department', $person->department)}}">
	<small class="text-danger">{{ $errors->first('department') }}</small>
</div>

<div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
	<label for="bio" class="control-label">Bio: </label>
	<textarea class="form-control" type="textarea" name="bio" cols="50" rows="10" id="bio">{{old('bio', $person->bio)}}</textarea>
	<small class="text-danger">{{ $errors->first('bio') }}</small>
</div>

@if(request()->has('from'))
<input type="hidden" name="from" value="{{request()->get('from')}}">
@endif