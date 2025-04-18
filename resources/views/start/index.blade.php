<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('http://localhost/RJD/livraria.jpg') no-repeat center center fixed;
        }
        .container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: rgba(52, 58, 64, 0.9); /* Fundo semi-transparente */
            color: white;
            padding: 20px;
            min-height: 100vh;
        }
        .sidebar h1 {
            font-size: 20px;
            margin-bottom: 15px;
        }
        .btn-custom {
            width: 100%;
            text-align: left;
            padding: 10px;
            margin: 10px 0;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .content {
            flex: 1;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            background: rgba(0, 0, 0, 0.5); /* Fundo escuro semi-transparente para melhor legibilidade */
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="sidebar">
            <h1>Login Admin</h1>
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('adm.login') }}" class="btn btn-custom">Usuário</a>
                </li>
            </ul>
            <h1>Login Cliente</h1>
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('user.login') }}" class="btn btn-custom">Shopping</a>
                </li>
            </ul>
        </div>
        <div class="content">
            <h2>Bem-vindo ao Painel</h2>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>