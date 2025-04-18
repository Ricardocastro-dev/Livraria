<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Venda</title>
    <!-- Link para o Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
        }

        .container {
            margin-top: 30px;
        }

        .sale-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .book-image img {
            max-width: 100%;
            border-radius: 8px;
            height: 150px;
        }

        .btn-custom {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center mb-4">Visualizar Venda</h1>

        <div class="sale-details">
            <p><strong>ID da Venda:</strong> {{ $sale->id }}</p>

            @if($sale->book && $sale->book->image)
                <div class="book-image mb-3">
                    <img src="{{ asset('storage/' . $sale->book->image) }}" alt="{{ $sale->book->name }}">
                </div>
            @endif

            <p><strong>Comprador:</strong> {{ $sale->user->name ?? 'Não informado' }}</p>
            <p><strong>Livro:</strong> {{ $sale->book->name }}</p>
            <p><strong>Quantidade:</strong> {{ $sale->quantity }}</p>
            <p><strong>Valor Total:</strong> R$ {{ number_format($sale->total_value, 2, ',', '.') }}</p>

            <div class="mt-4">
                <a href="{{ route('admsale.index') }}" class="btn btn-secondary btn-custom">Voltar para Listagem</a>
                <a href="{{ route('admsale.edit', ['sale' => $sale->id]) }}" class="btn btn-warning btn-custom">Editar Venda</a>
            </div>
        </div>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
