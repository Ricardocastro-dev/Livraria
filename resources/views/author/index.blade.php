<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
            margin-top: 80px;
            padding: 20px;
        }

        
        .btn-back {
            width: 8%;
            padding: 8px 16px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="header container-fluid">
        <h1 class="h3">Cadastrar Autor</h1>
        <a href="{{ route('author.create') }}" class="btn btn-primary">Cadastrar Autor</a>
    </div>

    <div class="container content">
        <h1 class="my-4">Listar Autores</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="list-group">
            @forelse ($authors as $author)
                <div class="list-group-item">
                    <h5>ID: {{ $author->id }}</h5>
                    <p>Nome: {{ $author->name }}</p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('author.show',['author' => $author->id]) }}" class="btn btn-info btn-sm">Visualizar</a>
                        <a href="{{ route('author.edit',['author' => $author->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="{{ route('author.destroy',['author' => $author->id]) }}" class="btn btn-danger btn-sm">Apagar</a>
                    </div>
                </div>
            @empty
                <p class="text-muted">Nenhum autor encontrado.</p>
            @endforelse

            
            <a href="{{ route('menu.index') }}" class="btn btn-secondary btn-back mt-3">Voltar</a>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Biblioteca Online</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

