<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Link para o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Personalizando o cabeçalho e rodapé */
        .header {
            background-color: #333;
            color: white;
            padding: 15px 0;
            text-align: center;
            margin-bottom: 20px;
        }

        .footer {
            background-color: #333;
            color: white;
            padding: 15px 0;
            text-align: center;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        /* Ajustando a margem do conteúdo para não cobrir o cabeçalho */
        .content {
            margin-top: 120px;
            margin-bottom: 60px;
        }

        .btn-custom {
            margin: 5px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .btn-back {
            width: 8%;
            padding: 8px 16px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Criar e Listar Editoras</h1>
    </div>

    <div class="container content">
        <!-- Botão de criação de editora -->
        <div class="row justify-content-center">
            <div class="col-md-4">
                <a href="{{ route('publisher.create') }}" class="btn btn-primary btn-custom w-100">Criar Editora</a>
            </div>
        </div>

        <!-- Exibindo editoras -->
        <h2 class="my-4">Listar Editoras</h2>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="list-group">
            @forelse ($publishers as $publisher)
                <div class="list-group-item">
                    <p>ID: {{ $publisher->id }}</p>
                    <p>Nome: {{ $publisher->name }}</p>
                    <div class="btn-group">
                        <a href="{{ route('publisher.show',['publisher' => $publisher->id]) }}" class="btn btn-info btn-custom">Visualizar</a>
                        <a href="{{ route('publisher.edit',['publisher' => $publisher->id]) }}" class="btn btn-warning btn-custom">Editar</a>
                        <a href="{{ route('publisher.destroy',['publisher' => $publisher->id]) }}" class="btn btn-danger btn-custom">Apagar</a>
                    </div>
                </div>
                <hr>
            @empty
                <p>Nenhuma editora encontrada.</p>
            @endforelse

            <a href="{{ route('menu.index') }}" class="btn btn-secondary btn-back mt-3">Voltar</a>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Sua Empresa</p>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
