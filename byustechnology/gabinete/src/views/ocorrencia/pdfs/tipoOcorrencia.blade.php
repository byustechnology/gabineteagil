<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocorrência - {{ $ocorrencia->id }}</title>

    <style>
        * {
            margin:0;
            padding:0
        }

        .container {
            padding: 20px 50px;
        }
    </style>
</head>
<body>

    @if ( ! empty($configuracao))
        <img style="max-width: 100%; margin-bottom: 20px;" src="{{ public_path('storage/' . $configuracao->ocorrencia_template_cabecalho) }}" alt="">
    @endif

    <div class="container">
        {!! $templateFormatado !!}
        {!! $ocorrencia->consideracao !!}
    </div>
</body>
</html>