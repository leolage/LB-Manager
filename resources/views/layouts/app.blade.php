<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($appName) ? $appName : env('APP_NAME') }}</title>
    <!-- Adicione links para seus estilos CSS, Bootstrap, etc. -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <!-- Cabeçalho -->
        <div class="row bg-light">
            <div class="col-md-12">
                <h1>{{ isset($appName) ? $appName : env('APP_NAME') }}</h1>
            </div>
        </div>

        <!-- Conteúdo da página -->
        <div class="row">
          <!-- Menu lateral -->
		<div class="col-md-3 bg-light text-dark">
			<ul class="nav flex-column">
				<li class="nav-item">
                    <form method="GET" action="{{ route('dashboard') }}" style="margin-top: 20px; margin-left: 20px;">
                        @csrf <!-- Adiciona o token CSRF para proteção contra ataques -->
                        <button type="submit" class="btn btn-primary">Inicial</button>
                    </form>
                </li>
				<li class="nav-item">
					<form method="GET" action="{{ route('add_domain_form') }}" style="margin-top: 20px; margin-left: 20px;">
					@csrf <!-- Adiciona o token CSRF para proteção contra ataques -->
					<button type="submit" class="btn btn-primary">Adicionar Domínio</button>
				</form>
				</li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" style="margin-top: 20px; margin-left: 20px;">
                        @csrf <!-- Adiciona o token CSRF para proteção contra ataques -->
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </li>
			</ul>
		</div>

            
            <!-- Conteúdo da página -->
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>

        <!-- Rodapé -->
        <footer class="row mt-4">
            <div class="col-md-12 text-center" align="right">
                <p>by Host One</p>
            </div>
        </footer>
    </div>

    <!-- Adicione scripts JavaScript, Bootstrap, etc. -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
