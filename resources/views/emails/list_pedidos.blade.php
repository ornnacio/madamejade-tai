<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
		<script src="https://kit.fontawesome.com/f523544bad.js" crossorigin="anonymous"></script>
		<title>Madame Jade - Pedidos</title>
    <style>
      body{
        font-family: Arial, sans-serif;
      }

      table, th, td {
        padding: 5px;
      }

      tr:nth-child(odd){
        background-color: #ffde59;
      }

      tr:nth-child(even){
        background-color: #ffefac;
      }
    </style>
    </head>
    <body>

		<div class="container-fluid">
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Cliente</th>
						<th scope="col">Descrição</th>
						<th scope="col">Total</th>
						<th scope="col">Produto</th>
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
