<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
        }
        .login-container {
            max-width: 400px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #6e8efb;
            border: none;
        }
        .btn-primary:hover {
            background-color: #5a7de0;
        }
        .footer-text {
            font-size: 0.9rem;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Login</a>
        </div>
    </nav>
    
    <div class="container d-flex flex-grow-1 align-items-center justify-content-center">
        <div class="login-container">
            <!-- Exibe mensagens de erro -->
            @if(session('error'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('start.index') }}" class="btn-back">🔙 </a>
            <h3 class="text-center mb-4">Entrar</h3>
            <form action="{{ route('login-adm-logar') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            
            <p class="mt-3 text-center footer-text">Não tem uma conta? <a href="{{ route('adm.create') }}">Criar uma conta</a></p>
        </div>
    </div>
    
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0 footer-text">&copy; 2025 Seu Site</p>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
