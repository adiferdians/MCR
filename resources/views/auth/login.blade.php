<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ URL::asset('/assets/css/login.css') }}" rel="stylesheet">
</head>
<body>
<div class="login">
	<h1>Welcome</h1>
    <form method="post">
    	<input type="text" name="u" placeholder="Username" required="required" />
        <input type="password" name="p" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Sign In</button>
    </form>
</div>
</body>
</html>