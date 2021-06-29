<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Landing page · {{ config('app.name') }}</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body class="d-flex h-100 text-center text-white bg-dark">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="mb-auto">
                <div>
                    <h3 class="float-md-start mb-0">{{ config('app.name') }}</h3>
                </div>
            </header>
            <main class="px-3">
				<div class="container">
					<div class="col-lg-4 offset-lg-4">
						<h1>Landing page</h1>
						<p>Essa é a landing page da sua aplicação. Você pode utilizar a página para exibir seus principais produtos e serviços, captando novos clientes e gerando <i>leads</i> para o seu negócio. Para acessar o sistem {{ config('app.name') }}, utilize o botão abaixo.</p>
						<p class="lead">
							<a href="{{ route('gabinete.dashboard') }}" class="btn btn-lg btn-primary">Ir para o app</a>
						</p>
					</div>
				</div>
            </main>
            <footer class="mt-auto text-white-50">
                <p></p>
            </footer>
        </div>
    </body>
</html>