<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocorrência - {{ $ocorrencia->id }}</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .page {
            padding: 20px;
            box-sizing: border-box;
        }
        .container {
            margin-top: 20px;
            padding: 20px 50px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>

    <div class="page">
        @if ( ! empty($configuracao))
            <img style="max-width: 100%;" src="{{ public_path('storage/' . $configuracao->ocorrencia_template_cabecalho) }}" alt="">
        @endif

        <div class="container">
            <?php echo $templateFormatado ?>
        </div>
    </div>
</body>
</html>