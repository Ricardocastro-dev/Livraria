<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Livro</title>

    <!-- Link para o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding-top: 50px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .form-container h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-container .form-group {
            margin-bottom: 15px;
        }

        .form-container label {
            font-weight: bold;
        }

        .form-container input, .form-container select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #3490dc;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container button:hover {
            background-color: #2779bd;
        }

        .form-container .alert-danger {
            color: #f00;
            background-color: #ffebeb;
            border: 1px solid #f00;
            padding: 10px;
            border-radius: 5px;
        }

        .form-container .image-preview img {
            width: 100px;
            height: auto;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="{{ route('book.index') }}" class="btn btn-secondary">Listar livros</a>
        <a href="{{ route('book.show', ['book' => $book->id]) }}" class="btn btn-info">Visualizar livro</a>

        <div class="form-container">
            <h1>Editar Livro</h1>
            
            <!-- Exibição de erros -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('book-update', ['book' => $book->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nome -->
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" id="name" name="name" placeholder="Nome do livro" value="{{ old('name', $book->name) }}" required>
                </div>

                <!-- Preço de Venda -->
                <div class="form-group">
                    <label for="sale_price">Preço de Venda</label>
                    <input type="number" id="sale_price" name="sale_price" placeholder="Preço de venda" value="{{ old('sale_price', $book->sale_price) }}" required>
                </div>

                <!-- Preço de Compra -->
                <div class="form-group">
                    <label for="purchase_price">Preço de Compra</label>
                    <input type="number" id="purchase_price" name="purchase_price" placeholder="Preço de compra" value="{{ old('purchase_price', $book->purchase_price) }}" required>
                </div>

                <!-- Quantidade -->
                <div class="form-group">
                    <label for="amount">Quantidade</label>
                    <input type="number" id="amount" name="amount" placeholder="Quantidade" value="{{ old('amount', $book->amount) }}" required>
                </div>

                <!-- Editora -->
                <div class="form-group">
                    <label for="publishers_id">Editora</label>
                    <select name="publishers_id" id="publishers_id" required>
                        <option value="">Selecione uma editora</option>
                        @foreach($publishers as $publisher)
                            <option value="{{ $publisher->id }}" {{ old('publishers_id', $book->publishers_id) == $publisher->id ? 'selected' : '' }}>
                                {{ $publisher->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Autor -->
                <div class="form-group">
                    <label for="authors_id">Autor</label>
                    <select name="authors_id" id="authors_id" required>
                        <option value="">Selecione um autor</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ old('authors_id', $book->authors_id) == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Imagem -->
                <div class="form-group">
                    <label for="image">Imagem</label>
                    <input type="file" name="image" id="image">
                </div>

                <!-- Exibe a imagem atual -->
                @if($book->image)
                    <div class="image-preview">
                        <p><strong>Imagem Atual:</strong></p>
                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}">
                    </div>
                @else
                    <p>Sem imagem atual.</p>
                @endif

                <!-- Botão de envio -->
                <button type="submit">Atualizar livro</button>
            </form>
        </div>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
