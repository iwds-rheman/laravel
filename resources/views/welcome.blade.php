<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>IPM | Internal Project Management &beta; v1.0</title>

		<link href="dashboard/css/bootstrap.min.css" rel="stylesheet">
		<link href="dashboard/font-awesome/css/font-awesome.css" rel="stylesheet">

		<link href="dashboard/css/animate.css" rel="stylesheet">
		<link href="dashboard/css/style.css" rel="stylesheet">
	</head>
	<body class="gray-bg">
		<div class="middle-box text-center animated fadeInDown">
			<div>
				<div>
					<h1 class="logo-name">IPM</h1>
				</div>
				
				<h3>Internal Project Management <sup>&beta; v1.0</sup></h3>
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				{!! Form::open(array('url' => '/')) !!}
                <div class="form-group">
                   {!!  Form::text(  'username', Input::old('UserName') , array( 'class' => 'form-control text-center', 'placeholder' => 'Username','required'=>'yes' ) ) !!}
                </div>
                <div class="form-group">
                   {!!  Form::password(  'password' , array( 'class' => 'form-control text-center', 'placeholder' => 'Password','required'=>'yes' ) ) !!}
                </div>
                {!!  Form::submit('Login', array('class' => 'btn btn-primary block full-width m-b')) !!}
                {!!  Form::close() !!}




     <p class="m-t">
         <small>Copyrights &copy; <script>document.write(new Date().getFullYear());</script></small>
     </p>
     <p class="m-t">
         <img src="dashboard/img/logo.png" alt="Intuitive Web Development Solutions">
     </p>
    </div>
    </div>

<!-- Mainly scripts -->
<script src="dashboard/js/jquery-2.1.1.js"></script>
<script src="dashboard/js/bootstrap.min.js"></script>
</body>
</html>
