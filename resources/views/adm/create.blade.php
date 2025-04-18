<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header, .footer {
            position: fixed;
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
        }
        .header {
            top: 0;
        }
        .footer {
            bottom: 0;
        }
        .content {
            margin-top: 100px;
            margin-bottom: 60px;
            padding: 20px;
            text-align: left;
        }
        .form-container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
            border: none;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }

        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Cadastro de Usuário</h2>
    </div>

    <div class="content">
        <div class="form-container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('adm-store') }}" method="POST">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="name" placeholder="Nome completo" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">E-mail:</label>
                    <input type="email" class="form-control" name="email" placeholder="Melhor email do usuário" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha:</label>
                    <input type="password" class="form-control" name="password" placeholder="Senha mínimo 6 caracteres" required>
                </div>

                <button type="submit" class="btn btn-custom">Cadastrar Usuário</button>
            </form>
        </div>
    </div>

    <div class="footer">
        <p>© 2025 - Todos os direitos reservados</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
