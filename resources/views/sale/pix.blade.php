<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Confirmada</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            max-width: 450px;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #28a745;
            color: white;
            text-align: center;
            font-size: 1.4rem;
            font-weight: bold;
            padding: 15px;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 25px;
            text-align: center;
        }

        .pix-box {
            background-color: #e9ecef;
            padding: 10px;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 5px;
            margin: 15px 0;
        }

        .btn {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-header">Compra Confirmada!</div>
        <div class="card-body">
            <p>Sua compra foi confirmada. O número para pagamento via Pix é:</p>
            <p class="pix-box">{{ $pixKey }}</p>
            <p>Aguardamos o seu pagamento para finalizar a transação.</p>

            <a href="{{ route('sale.shop') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
