<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>

    <!-- Adicionando Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 500px;
            width: 100%;
        }

        .form-label {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .form-control:focus {
            border-color: #0072ff;
            box-shadow: 0 0 10px rgba(0, 114, 255, 0.5);
        }

        .btn-primary {
            background-color: #0072ff;
            border: none;
            padding: 15px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 5px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #005bb5;
            transition: background-color 0.3s ease;
        }

        .error-message {
            color: #ff4d4d;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        h2 {
            text-align: center;
            color: #000000;
            margin-bottom: 30px;
        }

        .alert {
            margin-bottom: 20px;
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #0072ff;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-back:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <div class="container">
        <h2>Editar Usuário</h2>

        <a href="{{ route('user.index') }}" class="btn-back">🔙 Voltar para Lista</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="error-message">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user-update', ['user' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome completo" value="{{ old('name', $user->name) }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Melhor e-mail do usuário" value="{{ old('email', $user->email) }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Nova Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha mínimo 6 caracteres">
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>

    <!-- Adicionando o JS do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
