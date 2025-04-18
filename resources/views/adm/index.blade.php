<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Administradores</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center mb-4">Lista de Administradores</h2>

        <a href="{{ route('adm.create') }}" class="btn btn-primary mb-3">Criar Administrador</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($adms as $adm)
                    <tr>
                        <td>{{ $adm->id }}</td>
                        <td>{{ $adm->nome }}</td>
                        <td>{{ $adm->email }}</td>
                        <td>
                            <a href="{{ route('adm.show', ['adm' => $adm->id]) }}" class="btn btn-info btn-sm">Visualizar</a>
                            <a href="{{ route('adm.edit', ['adm' => $adm->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('adm.destroy', ['adm' => $adm->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Apagar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhum administrador cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>