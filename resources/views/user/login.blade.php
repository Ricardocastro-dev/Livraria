<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
        }
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
            text-align: center;
        }
        .login-container {
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

        .content-back{
            display: flex;
            justify-content: flex-start;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Login</h2>
    </div>

    <div class="content">
        <div class="login-container">
            <!-- Exibe mensagens de erro -->
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            
            <div class="content-back"><a href="{{ route('start.index') }}" class="btn-back">🔙 </a></div>
            <h3 class="text-center mb-4">Entrar</h3>
            <form action="{{ route('login_logar') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Senha:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <button type="submit" class="btn btn-custom">Entrar</button>
            </form>

            <p class="mt-3">Não tem uma conta? <a href="{{ route('user.create') }}">Criar uma conta</a></p>
        </div>
    </div>

    <div class="footer">
        <p>© 2025 - Todos os direitos reservados</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
