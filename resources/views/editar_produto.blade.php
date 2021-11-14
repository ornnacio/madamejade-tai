<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
		<script src="https://kit.fontawesome.com/f523544bad.js" crossorigin="anonymous"></script>
		<title>Madame Jade - Produtos</title>
    </head>
    <body>
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #928c8c;">
			<a class="navbar-brand" href="{{ url('/') }}">
				<img src="{{ asset('images/logo.png') }}" height="50" width="275">
			</a>
			<div class="collapse navbar-collapse justify-content-end" id="navbar">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="{{ url('produtos') }}">Produtos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('pedidos') }}">Pedidos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('mudas') }}">Berçário de mudas</a>
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

		<div style="width: 60%; margin: 0 auto; justify-content: center">
			<form method='POST' action="{{ route('editar_produto', ['id' => $produto->id]) }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<input class="form-control" name="nome" placeholder="Nome" value="{{ $produto->nome }}" required>
				</div>
				<div class="form-group">
					<textarea class="form-control" name="desc" placeholder="Descrição" rows="3" required>{{ $produto->desc }}</textarea>
				</div>
				<div class="form-group">
					<input class="form-control" name="preço" placeholder="Preço" value="{{ $produto->preço }}" required>
				</div>
				<div class="form-group">
					<input class="form-control" name="quantidade" placeholder="Quantidade" value="{{ $produto->quantidade }}" required>
				</div>
        <div class="form-group">
          @php
            !empty($produto->nome_arquivo) ? $nome_arquivo = $produto->nome_arquivo : $nome_arquivo = "placeholder.png";
          @endphp
					<input type='file' class="form-control" name="nome_arquivo" id="nome_arquivo" value="/storage/imagem/{{ $produto->nome_arquivo }}" placeholder="Imagem" required>
          <img src="/storage/imagem/{{ $nome_arquivo }}" width="300px" />
				</div>
				<div style="display: flex; justify-content: center;">
					<button type="submit" style="width: 130px;" class="btn btn-success">Salvar</button>
				</div>
			</form>
			@if(session()->get('msg'))
				<div class="container-card">
					<div class="card card-erro">
						<div class="card-body">
							{{session()->get('msg')}}
						</div>
					</div>
				</div>
			@endif
		</div>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</body>
</html>
