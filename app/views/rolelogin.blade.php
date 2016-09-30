<?php 
	$role = Aris\Role::where('shortname', Input::get('role'))->first();
	if (!is_object($role)) {
		die('role doesnt exist');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Please Log in To Continue</title>
</head>
<body>
	<style>
		*{margin:0; padding:0;font-family:sans-serif;}
		body,html{min-height: 100%;height:100%;}
		body{
			display: flex;
		    justify-content: center;
		    align-items: center;
		    background:#ededed;
		}
		h1{
			margin: 45px 0;
		}
		#middle{
			padding:50px;
			background: white;
			border:5px solid #1f97a0;
			border-radius:15px;
		}
		#interface{
			padding-top: 10px;
		}
		#password {
			padding:2px;
			margin:0 10px;
		}
	</style>	
	<div id="middle">
		<img src="/img/brand/aris-logo.png" height="60" width="auto">
		<h1>You need to be a {{ strtolower($role->description) }} to access this page</h1>
		<form method="POST" action="/rolelogin">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="return" value="{{Input::get('return')}}">
			<input type="hidden" name="role" value="{{Input::get('role')}}">
			<div id="interface">			
				<label for="password">Enter Password:</label>
				<input type="password" name="password" id="password">
				<input type="submit" name="submit">
			</div>
		</form>
	<!-- {{var_dump(Input::all())}} -->
	</div>


</body>
</html>