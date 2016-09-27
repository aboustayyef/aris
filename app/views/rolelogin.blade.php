<h1>Login For Role!</h1>
<form method="POST" action="/rolelogin">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="hidden" name="return" value="{{Input::get('return')}}">
	<input type="hidden" name="role" value="{{Input::get('role')}}">
	<label for="password">Password</label>
	<input type="password" name="password">
	<input type="submit" name="submit">
</form>
{{var_dump(Input::all())}}