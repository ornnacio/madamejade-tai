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
		
		<div class="container-fluid">
			<form method="POST" action="{{ route('buscar_produto') }}">
				@csrf
				<div class="row" style="margin: 0 auto">
					<div class="col d-flex flex-row">
						<div class="form-outline">
							<input type="search" placeholder="Digite sua pesquisa..." name="termo" class="form-control">
						</div>
						<div class="form-outline">
							<select name="tipo" class="form-control">
								<option value="nome">Nome</option>
								<option value="desc">Descrição</option>
							</select>
						</div>
						<div class="form-outline">
							<button type="submit" class="btn btn-success">
								<i class="fas fa-search"></i>
								Pesquisar
							</button>
						</div>
					</div>
					<div class="col">
						<div class="float-right d-flex flex-row">
							<div class="form-outline">
								<a class='btn btn-primary' href="{{ url('/adicionar_produto') }}">
									<i class="fas fa-plus"></i>
									Adicionar
								</a>
							</div>
							<div class="form-outline">
								<a class='btn btn-danger' href="{{ route('relatorio_produto') }}">
									<i class="far fa-file"></i>
									Gerar Relatório PDF
								</a>
							</div>
						</div>
					</div>
				</div>
			</form>
			
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nome</th>
						<th scope="col">Descrição</th>
						<th scope="col">Preço</th>
						<th scope="col">Quantidade</th>
						<th scope="col">Editar</th>
						<th scope="col">Deletar</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($produtos as $p): ?>
						<tr>
							<th><?= $p->id; ?></th>
							<td><?= $p->nome; ?></td>
							<td><?= $p->desc; ?></td>
							<td>R$<?= $p->preço; ?></td>
							<td><?= $p->quantidade; ?> unidade(s)</td>
							<td><a style="font-size: 25px;" href="{{ route('editar_produto', ['id' => $p->id]) }}"><i class="fas fa-edit"></i></a></td>
							<td><a style="font-size: 25px; color: red;" href="{{ route('deletar_produto', ['id' => $p->id]) }}" onclick="return confirm('Deletar esse item?');" ><i class="far fa-trash-alt"></i></a></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			
			
		</div>
		
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
	</body>
</html>