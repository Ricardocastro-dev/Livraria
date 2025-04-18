<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
        }
        .content {
            margin-top: 80px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2rem;
            color: #333;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .success-message {
            color: #28a745;
            font-weight: bold;
        }

    </style>
</head>
<body>

    <div class="container content">
        <a href="{{ route('adm.index') }}" class="btn btn-custom mb-3">Listar</a>
        <a href="{{ route('adm.edit', ['adm' => $adm->id]) }}" class="btn btn-warning mb-3">Editar</a>

        <h1>Visualizar Usuário</h1>

        @if(session('success'))
            <p class="success-message">
                {{ session('success') }}
            </p>
        @endif

        <div>
            <p><strong>ID:</strong> {{ $adm->id }}</p>
            <p><strong>Nome:</strong> {{ $adm->nome }}</p> <!-- Usando 'nome' -->
            <p><strong>E-mail:</strong> {{ $adm->email }}</p>
            <p><strong>Cadastrado:</strong> {{ \Carbon\Carbon::parse($adm->created_at)->format('d/m/Y H:i:s') }}</p>
            <p><strong>Editado:</strong> {{ \Carbon\Carbon::parse($adm->updated_at)->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
