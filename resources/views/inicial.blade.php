<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
		<script src="https://kit.fontawesome.com/f523544bad.js" crossorigin="anonymous"></script>
		<title>Madame Jade - Início</title>
    </head>
    <body>
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #928c8c;">
			<a class="navbar-brand" href="{{ url('/') }}">
				<img src="{{ asset('images/logo.png') }}" height="50" width="275">
			</a>
			<div class="collapse navbar-collapse justify-content-end" id="navbar">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('produtos') }}">Produtos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('pedidos') }}">Pedidos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('mudas') }}">Berçário de mudas</a>
					</li>
          <li class="nav-item">
						<a class="nav-link" href="{{ url('vendas') }}">Gráfico de vendas</a>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span style="font-size: 40px; color: #ffde59;">
								<i class="fas fa-user-circle"></i>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-login" aria-labelledby="navbarDropdown">
							<p class="dropdown-item-text">Logado como {{ session()->get('user_email') }}</p>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ url('/logout') }}">Sair</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>

		<div class="container">

			<div style="margin-top: 20px;">
				<div class="row">
					<div class="col">
						<div class="card card-inicial">
							<div class="card-body">
								<div class="row align-items-center justify-content-between" style="padding: 10px 20px;">
									<img src="{{ asset('images/icon-produtos.png') }}" class="icon-card-inicial">
									<h5 class="card-title" style="vertical-align: middle;">Visualizar produtos</h5>
								</div>
								<div style="text-align: center; margin: 10px;">
									<p class="card-text">Ver uma tabela com os produtos em estoque</p>
								</div>
								<div style="display: flex; justify-content: center;">
									<a href="{{ url('/produtos') }}" class="btn btn-inicial">Ver</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card card-inicial">
							<div class="card-body">
								<div class="row align-items-center justify-content-between" style="padding: 10px 20px;">
									<img src="{{ asset('images/icon-pedidos.png') }}" class="icon-card-inicial">
									<h5 class="card-title" style="vertical-align: middle;">Visualizar pedidos</h5>
								</div>
								<div style="text-align: center; margin: 10px;">
									<p class="card-text">Ver uma tabela com os pedidos ainda não finalizados</p>
								</div>
								<div style="display: flex; justify-content: center;">
									<a href="{{ url('/pedidos') }}" class="btn btn-inicial">Ver</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card card-inicial">
							<div class="card-body">
								<div class="row align-items-center justify-content-between" style="padding: 10px 20px;">
									<img src="{{ asset('images/icon-mudas.png') }}" class="icon-card-inicial">
									<h5 class="card-title" style="vertical-align: middle;">Berçário de mudas</h5>
								</div>
								<div style="text-align: center; margin: 10px;">
									<p class="card-text">Ver uma tabela com as mudas plantadas e suas informações</p>
								</div>
								<div style="display: flex; justify-content: center;">
									<a href="{{ url('/mudas') }}" class="btn btn-inicial">Ver</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</body>
</html>
