<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
        }
        .content {
            margin-top: 50px;
            padding: 30px;
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
            color: rgb(254, 254, 254);
            border: none;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }

        .alert {
            font-size: 0.9rem;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input {
            margin-bottom: 15px;
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
    </style>
</head>
<body>

    <div class="container content">
        <a href="{{ route('adm.index') }}" class="btn btn-primary">Listar</a>
        <a href="{{ route('adm.show',['adm'=>$adm->id]) }}" class="btn btn-warning">Visualizar</a>

        <h1>Editar Usuário</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('adm-update',['adm'=>$adm->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" name="name" class="form-control" placeholder="Nome completo" value="{{ old('name', $adm->name) }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" name="email" class="form-control" placeholder="Melhor e-mail do usuário" value="{{ old('email', $adm->email) }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" name="password" class="form-control" placeholder="Senha (mínimo 6 caracteres)" value="{{ old('password') }}">
            </div>

            <button type="submit" class="btn btn-custom">Editar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
