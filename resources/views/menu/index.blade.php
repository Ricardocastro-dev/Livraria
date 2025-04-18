<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Menu</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"></script>
    <style>
        body {
            padding-top: 70px;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menu Adm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('author.index') }}">Autores</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('publisher.index') }}">Editoras</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('book.index') }}">Livros</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.index') }}">Clientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('adm.index') }}">Admin Usuários</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admsale.create') }}">Criar Venda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admsale.index') }}">Vendas</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout-adm') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-white">Sair</button>
                    </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container text-center">
        <h2 class="my-4">Bem-vindo ao painel administrativo</h2>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <i class="bi bi-people fs-1"></i>
                    <h5>Autores Registrados</h5>
                    <p class="fs-3">{{ $authors_count }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <i class="bi bi-book fs-1"></i>
                    <h5>Livros Disponíveis</h5>
                    <p class="fs-3">{{ $books_count }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <i class="bi bi-cart fs-1"></i>
                    <h5>Vendas Realizadas</h5>
                    <p class="fs-3">{{ $sales_count }}</p>
                </div>
            </div>
        </div>
        
        <!-- Últimos Livros Adicionados -->
        <div class="mt-4">
            <h4>Últimos Livros Adicionados</h4>
            <div class="row">
                @foreach($latest_books as $book)
                    <div class="col-md-4">
                        <div class="card p-3 mb-3">
                            <h5>{{ $book->name ?? 'Nome não disponível' }}</h5>
                            <p><strong>Autor:</strong> {{ $book->author->name ?? 'Autor não disponível' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <div class="footer">
        <p>© 2025 Admin Panel</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>