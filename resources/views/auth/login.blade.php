@extends('layouts.main')
@section('content')
		<div class="middle-box text-center animated fadeInDown">
			<div>
				<div>
					<h1 class="logo-name">IPM</h1>
				</div>
				
				<h3>Internal Project Management <sup>&beta; v1.0</sup></h3>
				
				<form class="m-t" role="form" action="http://localhost/laravel/dashboard/">
					<div class="form-group">
						<input type="text" class="form-control text-center" placeholder="Username" required="">
					</div>
					<div class="form-group">
						<input type="password" class="form-control text-center" placeholder="Password" required="">
					</div>
					<button type="submit" class="btn btn-primary block full-width m-b">Login</button>
				</form>
				
				<p class="m-t">
					<small>Copyrights &copy; <script>document.write(new Date().getFullYear());</script></small>
				</p>
				<p class="m-t">
					<img src="/img/logo.png" alt="Intuitive Web Development Solutions">
				</p>
			</div>
		</div>
@stop

@section('style')
	{!! Html::style( asset('css/bootstrap.min.css')) !!}
	{!! Html::style( asset('css/style.css')) !!}
	{!! Html::style( asset('css/animate.css')) !!}
	{!! Html::style( asset('font-awesome/css/font-awesome.css')) !!}
@stop

@section('scripts')
	{!! Html::style( asset('js/jquery-2.1.1.js')) !!}
	{!! Html::style( asset('js/bootstrap.min.js')) !!}
@stop