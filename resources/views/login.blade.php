<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  		<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  		<script src="https://kit.fontawesome.com/f523544bad.js" crossorigin="anonymous"></script>
  		<title>Madame Jade - Login</title>
    </head>
    <body>
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #928c8c;">
			<a class="navbar-brand" href="{{ url('/') }}">
				<img src="{{ asset('images/logo.png') }}" height="50" width="275">
			</a>
			<div class="collapse navbar-collapse justify-content-end" id="navbar">
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span style="font-size: 40px; color: #ffde59;">
								<i class="fas fa-user-circle"></i>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-login" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ url('/login') }}">Login</a>
							<a class="dropdown-item" href="{{ url('/cadastro') }}">Cadastro</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>

		<div class="container-fluid">
			<div style="display: flex; justify-content: center;">
				<img src="{{ asset('images/logoext.png') }}" width="50%" class="logo-login">
			</div>
			<div class="container container-login">
				<form method='POST' action="login">
					@csrf
					<div class="form-group">
						<input type="email" class="form-control" name="email" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="senha" placeholder="Senha" required>
					</div>
					<div style="display: flex; justify-content: center;">
						<button type="submit" class="btn btn-login">Entrar</button>
					</div>
          @include('layouts/flash-message')
				</form>
			</div>

		</div>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>
