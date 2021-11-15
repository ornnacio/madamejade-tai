<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
		<script src="https://kit.fontawesome.com/f523544bad.js" crossorigin="anonymous"></script>
		<title>Madame Jade - Vendas</title>
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
          <li class="nav-item active">
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

    <div class="container px-4 mx-auto" style="margin: 30px">
        <div class="p-6 m-20 bg-white rounded shadow">
            {!! $chart->container() !!}
        </div>
    </div>

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
  </body>
</html>
