<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Livros</title>
    <!-- Link para o Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 30px;
        }

        .book-image {
            max-width: 100px;
            height: auto;
        }

        .btn-custom {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        .btn-danger-custom {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-danger-custom:hover {
            background-color: #c82333;
        }

        table th, td {
            vertical-align: middle;
        }
    </style>

    <script>
        function confirmarCompra(event) {
            event.preventDefault(); // Impede o envio do formulário imediatamente
            const confirma = confirm("Você tem certeza que deseja comprar este livro?");
            
            if (confirma) {
                event.target.submit(); // Se o usuário confirmar, envia o formulário
            }
        }

        function atualizarTotal(input, preco, idTotal) {
            const quantidade = input.value;
            const total = preco * quantidade;
            document.getElementById(idTotal).innerText = 'R$ ' + total.toFixed(2).replace('.', ',');
        }
    </script>
</head>
<body>

    <div class="container">
        <h2 class="text-center mb-4">Loja de Livros</h2>

        <a href="{{ route('menucliente.index') }}" class="btn btn-secondary btn-back mt-3">Voltar</a>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th>Comprar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <!-- Exibe a imagem do livro -->
                        <td>
                            @if($book->image)
                                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" class="book-image">
                            @else
                                <p>Sem imagem</p>
                            @endif
                        </td>
                        <td>{{ $book->name }}</td>
                        <td>R$ {{ number_format($book->sale_price, 2, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('sale.confirm') }}" method="GET" onsubmit="confirmarCompra(event)">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                
                                <input type="number" name="quantity" min="1" max="{{ $book->amount }}" 
                                       class="form-control" required oninput="atualizarTotal(this, {{ $book->sale_price }}, 'total-{{ $book->id }}')">
                        </td>
                        <td id="total-{{ $book->id }}">R$ 0,00</td>
                        <td>
                            <button type="submit" class="btn btn-success">Comprar</button>
                        </td>
                    </form>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
