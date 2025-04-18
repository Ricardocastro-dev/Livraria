<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Livros</title>

    <!-- Link para o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .book-container {
            margin-bottom: 30px;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .book-details {
            margin-bottom: 15px;
        }

        .book-image img {
            width: 100%;
            max-width: 200px;
            border-radius: 8px;
        }

        .book-actions a {
            margin-right: 10px;
        }

        .alert-success {
            color: green;
            font-weight: bold;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            padding: 15px;
            z-index: 1000;
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

        .footer {
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px;
        }

        .content {
            margin-top: 100px;
            padding: 20px;
        }

        .book-container img {
            width: 100%;
            max-width: 150px;
            height: auto;
        }

        /* Responsividade para imagens e containers */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 20px;
            }

            .book-container {
                padding: 15px;
            }

            .book-image img {
                max-width: 120px;
            }
        }

    </style>
</head>
<body>

    <div class="header">
        <h1>Listar Livros</h1>
        <a href="{{ route('book.create') }}" class="btn-custom">Criar Novo Livro</a>
    </div>

    <div class="content container-fluid">
        @if(session('success'))
            <p class="alert-success">{{ session('success') }}</p>
        @endif

        @forelse ($books as $book)
            <div class="book-container shadow-sm">
                <div class="book-details">
                    <strong>ID:</strong> {{ $book->id }}<br>
                    <strong>Nome:</strong> {{ $book->name }}<br>
                    <strong>Preço de Venda:</strong> R$ {{ number_format($book->sale_price, 2, ',', '.') }}<br>
                    <strong>Preço de Compra:</strong> R$ {{ number_format($book->purchase_price, 2, ',', '.') }}<br>
                    <strong>Quantidade:</strong> {{ $book->amount }}<br>
                    <strong>Editora:</strong> {{ $book->publisher ? $book->publisher->name : 'Não especificado' }}<br>
                    <strong>Autor:</strong> {{ $book->author ? $book->author->name : 'Não especificado' }}<br>
                </div>

                @if($book->image)
                    <div class="book-image mb-3">
                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}">
                    </div>
                @endif

                <div class="book-actions">
                    <a href="{{ route('book.show', ['book' => $book->id]) }}" class="btn btn-info btn-sm">Visualizar</a>
                    <a href="{{ route('book.edit', ['book' => $book->id]) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('book.destroy', ['book' => $book->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Apagar</button>
                    </form>
                </div>
            </div>

            <hr>

        @empty
            <p class="text-center">Nenhum livro encontrado.</p>
        @endforelse

        <div class="text-center">
            <a href="{{ route('menu.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>

    <div class="footer">
        <p>© 2025 Lista de Livros</p>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
