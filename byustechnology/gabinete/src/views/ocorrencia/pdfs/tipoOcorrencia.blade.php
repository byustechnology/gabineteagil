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
            padding: 20px 30px;
            box-sizing: border-box;
            font-size: 12px;
        }

        .ql-indent-1 { margin-left: 20px; }
        .ql-indent-2 { margin-left: 40px; }
        .ql-indent-3 { margin-left: 60px; }
        .ql-indent-4 { margin-left: 80px; }
        .ql-indent-5 { margin-left: 100px; }
        .ql-indent-6 { margin-left: 120px; }
        .ql-indent-7 { margin-left: 140px; }
        .ql-indent-8 { margin-left: 160px; }
        .ql-indent-9 { margin-left: 180px; }
        .ql-indent-10 { margin-left: 200px; }

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