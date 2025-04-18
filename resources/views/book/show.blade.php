<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Livro</title>

    <!-- Link para o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        .book-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }

        .book-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .book-details p {
            font-size: 16px;
            margin: 10px 0;
        }

        .book-image img {
            max-width: 100%;
            height: 150px;
            border-radius: 8px;
        }

        .btn-custom {
            background-color: #3490dc;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #2779bd;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="book-container">
            <h1>Detalhes do Livro</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="book-details">
                <p><strong>ID:</strong> {{ $book->id }}</p>
                <p><strong>Nome:</strong> {{ $book->name }}</p>
                <p><strong>Preço de Venda:</strong> R$ {{ number_format($book->sale_price, 2, ',', '.') }}</p>
                <p><strong>Preço de Compra:</strong> R$ {{ number_format($book->purchase_price, 2, ',', '.') }}</p>
                <p><strong>Quantidade:</strong> {{ $book->amount }}</p>
                <p><strong>Editora:</strong> {{ $book->publisher->name }}</p>
                <p><strong>Autor:</strong> {{ $book->author->name }}</p>
                <p><strong>Cadastrado em:</strong> {{ \Carbon\Carbon::parse($book->created_at)->format('d/m/Y H:i:s') }}</p>
                <p><strong>Editado em:</strong> {{ \Carbon\Carbon::parse($book->updated_at)->format('d/m/Y H:i:s') }}</p>
            </div>

            @if($book->image)
                <div class="book-image mb-3">
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}">
                </div>
            @else
                <p><strong>Imagem:</strong> Não disponível</p>
            @endif

            <div class="text-center">
                <a href="{{ route('book.index') }}" class="btn btn-secondary btn-custom">Voltar para Listar Livros</a>
                <a href="{{ route('book.edit', ['book' => $book->id]) }}" class="btn btn-warning btn-custom">Editar Livro</a>
            </div>
        </div>
    </div>
    @if($book->image)
    <div class="book-image mb-3">
        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}">
    </div>
@else
    <p><strong>Imagem:</strong> Não disponível</p>
@endif


    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
