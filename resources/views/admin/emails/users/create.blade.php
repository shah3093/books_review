<html>
<head>

</head>
<body>
<p>Dear {{$data['name']}}</p>

<p>Your have been added to {{ Config::get('constants.app.APP_NAME') }} as {{$data['user_type']}}</p>
<p>Now you can login by your email and password {{$data['password']}}</p>
<p>Remember this password is auto generetaed . After login please change your password</p>

<br/><br/>
Thanks,<br>
{{ Config::get('constants.app.APP_NAME') }}

</body>
</html>
