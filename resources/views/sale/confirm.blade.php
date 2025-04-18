<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Compra</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            max-width: 450px;
            width: 100%;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 1.3rem;
            font-weight: bold;
            padding: 15px;
            border-radius: 8px 8px 0 0;
        }

        .card-body {
            padding: 25px;
        }

        .info {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            width: 48%;
            padding: 12px;
            font-size: 1rem;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-header">Confirmação de Compra</div>
        <div class="card-body">
            <p class="info"><strong>Livro:</strong> {{ $book->name }}</p>
            <p class="info"><strong>Quantidade:</strong> {{ $quantity }}</p>
            <p class="info"><strong>Total:</strong> R$ {{ number_format($total, 2, ',', '.') }}</p>

            <form action="{{ route('sale-store') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <input type="hidden" name="quantity" value="{{ $quantity }}">
                <input type="hidden" name="total_value" value="{{ $total }}">

                <div class="btn-group">
                    <button type="submit" class="btn btn-success">Confirmar</button>
                    <a href="{{ route('sale.shop') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
