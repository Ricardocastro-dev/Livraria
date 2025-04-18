<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu Cliente</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px; /* Ajuste para a navbar fixa */
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px 0;
            width: 100%;
            bottom: 0;
        }
        .container {
            margin-top: 20px;
        }
        .carousel-item img {
            max-height: 400px;
            width: auto;
            object-fit: fill;
        }

        .card-img-top {
            width: 100%; /* A largura se ajusta ao card */
            height: 250px; /* Ajuste a altura conforme necessário */
            object-fit: fill; /* Garante que a imagem cubra o espaço sem distorcer */
            border-top-left-radius: 8px; /* Bordas arredondadas superiores */
            border-top-right-radius: 8px;
        }

        .card {
            width: 80%;
            height: auto;
            justify-content: space-between;
        }


    </style>
</head>
<body>

    <!-- Navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menu Cliente</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('sale.shop') }}">🛒 Shopping</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-white" style="border: none; cursor: pointer;">Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carrossel -->
    <div class="container text-center">
        <h2>Bem-vindo ao Menu Cliente</h2>

        <!-- Carousel -->
<div id="carouselBanners" class="carousel slide mt-4" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://c4.wallpaperflare.com/wallpaper/995/304/869/movies-harry-potter-1920x1080-entertainment-movies-hd-art-wallpaper-preview.jpg" class="d-block w-100" alt="Harry Potter">
            <div class="carousel-caption d-none d-md-block">
                <h5>Harry Potter</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://observatoriodocinema.com.br/wp-content/plugins/seox-image-magick/imagick_convert.php?width=1920&height=1080&format=.jpg&quality=91&imagick=uploads-observatoriodocinema.seox.com.br/2024/11/iron-throne-of-game-of-thrones-nf79q124fikj37px.jpg" class="d-block w-100" alt="Game of Thrones">
            <div class="carousel-caption d-none d-md-block">
                <h5>Game of Thrones</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.alphacoders.com/809/809668.jpg" class="d-block w-100" alt="Percy Jackson">
            <div class="carousel-caption d-none d-md-block">
                <h5>Percy Jackson</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://wallpapers.com/images/featured/as-cronicas-de-narnia-x329acr8heedvz5y.jpg" class="d-block w-100" alt="As Crônicas de Nárnia">
            <div class="carousel-caption d-none d-md-block">
                <h5>As Crônicas de Nárnia</h5>
            </div>
        </div>
    </div>
</div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanners" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselBanners" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

    </div>

    <!-- Cartões de Livros -->
    <div class="container mt-5">
        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-3">
                    <div class="card">
                        <!-- Exibe a imagem do livro -->
                        @if($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top" alt="{{ $book->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->name }}</h5>
                            <p class="card-text">
                                Preço de Venda: R$ {{ number_format($book->sale_price, 2, ',', '.') }}<br>
                                Quantidade: {{ $book->amount }}<br>
                                Autor: {{ $book->author ? $book->author->name : 'Não especificado' }}<br>
                                Editora: {{ $book->publisher ? $book->publisher->name : 'Não especificado' }}
                            </p>
                            <!-- Botão "Saiba mais" -->
                            <a href="{{ route('book.show', ['book' => $book->id]) }}" class="btn btn-primary">Saiba mais</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Rodapé -->
    <div class="footer">
        <p>© 2025 Lista de Livros</p>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
