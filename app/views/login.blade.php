<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Log In as Admin</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
	 <div class="container">
	<img src="img/uploads/drjavidabdel.jpg" alt="">
	{{ Form::open(array('action'=>'session.store', 'class' => 'form-signin', 'style'=>'max-width:300px')) }}
        <h2 class="form-signin-heading">Please sign in</h2>
		{{ Form::email('email', null, ['class' =>'form-control','placeholder' => 'Email Address']) }}
		{{ Form::password('password', ['class'=>'form-control','placeholder' => 'Password']) }}
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>     
     {{ Form::close() }}

    </div> <!-- /container -->
</body>
</html>