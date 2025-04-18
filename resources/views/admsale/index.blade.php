<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Vendas</title>
    <!-- Link para o Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #cecece;
        }

        .container {
            margin-top: 30px;
        }

        .sale-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .sale-card img {
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

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center mb-4">Listar Vendas</h1>

        <a href="{{ route('admsale.create') }}" class="btn btn-primary mb-3">Criar Venda</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @forelse ($sales as $sale)
            <div class="sale-card">
                <p><strong>ID da Venda:</strong> {{ $sale->id }}</p>
                <p><strong>Livro:</strong> {{ $sale->book->name }}</p>
                <p><strong>Preço de Venda:</strong> R$ {{ number_format($sale->book->sale_price, 2, ',', '.') }}</p>
                <p><strong>Preço de Compra:</strong> R$ {{ number_format($sale->book->purchase_price, 2, ',', '.') }}</p>
                <p><strong>Quantidade Vendida:</strong> {{ $sale->quantity }}</p>
                <p><strong>Editora:</strong> {{ $sale->book->publisher ? $sale->book->publisher->name : 'Não especificado' }}</p>
                <p><strong>Autor:</strong> {{ $sale->book->author ? $sale->book->author->name : 'Não especificado' }}</p>

                @if($sale->book->image)
                    <img src="{{ asset('storage/' . $sale->book->image) }}" alt="{{ $sale->book->name }}" class="img-fluid mb-3">
                @else
                    <p>Imagem não disponível.</p>
                @endif

                <a href="{{ route('admsale.show', ['sale' => $sale->id]) }}" class="btn btn-info btn-sm mb-2">Visualizar Venda</a>
                <a href="{{ route('admsale.edit', ['sale' => $sale->id]) }}" class="btn btn-warning btn-sm mb-2">Editar Venda</a>
                <a href="{{ route('admsale.destroy', ['sale' => $sale->id]) }}" class="btn btn-danger btn-sm mb-2">Apagar Venda</a>
            </div>
        @empty
            <p>Nenhuma venda registrada.</p>
        @endforelse
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
