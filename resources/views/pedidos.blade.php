<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
		<script src="https://kit.fontawesome.com/f523544bad.js" crossorigin="anonymous"></script>
		<title>Madame Jade - Pedidos</title>
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
					<li class="nav-item active">
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

		<div class="container-fluid">
      @include("layouts/flash-message")
			<form method="POST" action="{{ route('buscar_pedido') }}">
				@csrf
				<div class="row" style="margin: auto">
					<div class="col d-flex flex-row">
						<div class="form-outline">
							<input type="search" placeholder="Digite sua pesquisa..." name="termo" class="form-control">
						</div>
						<div class="form-outline">
							<select name="tipo" class="form-control">
								<option value="cliente">Cliente</option>
								<option value="descrição">Descrição</option>
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
								<a class='btn btn-primary' href="{{ url('/adicionar_pedido') }}">
									<i class="fas fa-plus"></i>
									Adicionar
								</a>
							</div>
							<div class="form-outline">
								<a class='btn btn-danger' href="{{ route('relatorio_pedido') }}">
									<i class="far fa-file"></i>
									Gerar Relatório PDF
								</a>
							</div>
              <div class="form-outline">
								<a class='btn btn-info' href="{{ route('email_pedido') }}">
									<i class="far fa-envelope"></i>
									Enviar listagem por email
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
						<th scope="col">Cliente</th>
						<th scope="col">Descrição</th>
						<th scope="col">Total</th>
						<th scope="col">Produto</th>
						<th scope="col">Editar</th>
						<th scope="col">Finalizar</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($pedidos as $p):
						$prod = App\Models\Produto::findOrFail($p->id_produto);
					?>
						<tr>
							<th><?= $p->id; ?></th>
							<td><?= $p->cliente; ?></td>
							<td><?= $p->descrição; ?></td>
							<td>R$<?= $p->total; ?></td>
							<td><?= $prod->nome; ?></td>
							<td><a style="font-size: 25px;" href="{{ route('editar_pedido', ['id' => $p->id]) }}"><i class="fas fa-edit"></i></a></td>
							<td><a style="font-size: 25px; color: green;" href="{{ route('deletar_pedido', ['id' => $p->id]) }}" onclick="return confirm('Marcar pedido como entregue? Ele será removido da tabela.');" ><i class="far fa-check-square"></i></a></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

      <div class="d-flex justify-content-center">
        {{$pedidos->links()}}
      </div>

		</div>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</body>
</html>
