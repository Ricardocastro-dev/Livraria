<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4>Detalhes do Autor</h4>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $author->id }}</p>
                <p><strong>Nome:</strong> {{ $author->name }}</p>
                <p><strong>Cadastrado em:</strong> {{  \Carbon\Carbon::parse($author->created_at)->format('d/m/Y H:i:s') }}</p>
                <p><strong>Editado em:</strong> {{  \Carbon\Carbon::parse($author->updated_at)->format('d/m/Y H:i:s') }}</p>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('author.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>