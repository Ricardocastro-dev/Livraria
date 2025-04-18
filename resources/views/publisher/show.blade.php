<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Editora</title>

    <!-- Link para o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .container {
            max-width: 600px;
        }

        .card {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <h2 class="text-center mb-4">Detalhes da Editora</h2>
            
            <p><strong>ID:</strong> {{ $publisher->id }}</p>
            <p><strong>Nome:</strong> {{ $publisher->name }}</p>
            <p><strong>E-mail:</strong> {{ $publisher->email }}</p>
            <p><strong>Cadastrado em:</strong> {{ \Carbon\Carbon::parse($publisher->created_at)->format('d/m/Y H:i:s') }}</p>
            <p><strong>Editado em:</strong> {{ \Carbon\Carbon::parse($publisher->updated_at)->format('d/m/Y H:i:s') }}</p>

            <div class="text-center">
                <a href="{{ route('publisher.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
