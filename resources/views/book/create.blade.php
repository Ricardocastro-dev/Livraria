<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livro</title>

    <!-- Link para o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container .form-group {
            margin-bottom: 15px;
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

        .form-container .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h1>Cadastro de Livro</h1>

            <!-- Exibição de erros -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Erro!</strong> Verifique os campos abaixo:<br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('book-store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nome do livro" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="sale_price">Preço de Venda:</label>
                    <input type="number" step="0.01" id="sale_price" name="sale_price" class="form-control" placeholder="Preço de venda" value="{{ old('sale_price') }}" required>
                </div>

                <div class="form-group">
                    <label for="purchase_price">Preço de Compra:</label>
                    <input type="number" step="0.01" id="purchase_price" name="purchase_price" class="form-control" placeholder="Preço de compra" value="{{ old('purchase_price') }}" required>
                </div>

                <div class="form-group">
                    <label for="amount">Quantidade:</label>
                    <input type="number" id="amount" name="amount" class="form-control" placeholder="Quantidade" value="{{ old('amount') }}" required>
                </div>

                <div class="form-group">
                    <label for="publishers_id">Editora:</label>
                    <select name="publishers_id" id="publishers_id" class="form-control" required>
                        <option value="">Selecione uma editora</option>
                        @foreach($publishers as $publisher)
                            <option value="{{ $publisher->id }}" {{ old('publishers_id') == $publisher->id ? 'selected' : '' }}>
                                {{ $publisher->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="authors_id">Autor:</label>
                    <select name="authors_id" id="authors_id" class="form-control" required>
                        <option value="">Selecione um autor</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ old('authors_id') == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Imagem do Livro:</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                </div>

                <button type="submit">Cadastrar Livro</button>
            </form>
        </div>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
