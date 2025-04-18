<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Venda</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            padding-top: 50px;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: bold;
        }

        .btn-custom {
            background-color: #3490dc;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #2779bd;
        }

        .book-image img {
            max-width: 150px;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
        }

        .alert-custom {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center mb-4">Edição de Venda</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admsale-update', ['sale' => $sale->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="user_id" class="form-label">Comprador:</label>
                <select name="user_id" id="user_id" class="form-select" required>
                    <option value="">Selecione um usuário</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $sale->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="book_id" class="form-label">Livro:</label>
                <select name="book_id" id="book_id" class="form-select" required>
                    <option value="">Selecione um livro</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" 
                                data-price="{{ $book->sale_price }}" 
                                data-stock="{{ $book->amount + $sale->quantity }}" 
                                data-image="{{ asset('storage/' . $book->image) }}"
                                {{ $sale->book_id == $book->id ? 'selected' : '' }}>
                            {{ $book->name }} (R$ {{ number_format($book->sale_price, 2, ',', '.') }} | Estoque: {{ $book->amount + $sale->quantity }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div id="book-image" class="book-image">
                <h3>Imagem do Livro:</h3>
                <img id="book-image-preview" src="{{ asset('storage/' . $sale->book->image) }}" alt="Imagem do Livro">
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantidade:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantidade" value="{{ $sale->quantity }}" min="1" required>
            </div>

            <div class="mb-3">
                <label for="total_value" class="form-label">Valor Total:</label>
                <input type="text" id="total_value" class="form-control" placeholder="Valor total" readonly value="R$ {{ number_format($sale->total_value, 2, ',', '.') }}">
            </div>

            <button type="submit" class="btn btn-custom">Atualizar Venda</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const bookSelect = document.getElementById("book_id");
            const quantityInput = document.getElementById("quantity");
            const totalValueInput = document.getElementById("total_value");
            const bookImagePreview = document.getElementById("book-image-preview");

            function updateTotal() {
                const selectedBook = bookSelect.options[bookSelect.selectedIndex];
                const price = parseFloat(selectedBook.getAttribute("data-price")) || 0;
                const stock = parseInt(selectedBook.getAttribute("data-stock")) || 0;
                const quantity = parseInt(quantityInput.value) || 1;

                if (quantity > stock) {
                    alert("Quantidade maior que o estoque disponível!");
                    quantityInput.value = stock; // Ajusta a quantidade para o estoque máximo
                }

                totalValueInput.value = "R$ " + (price * quantity).toFixed(2).replace(".", ",");
            }

            bookSelect.addEventListener("change", function () {
                updateTotal();
                quantityInput.value = 1; // Define um valor padrão

                // Atualiza a imagem do livro selecionado
                const selectedBook = bookSelect.options[bookSelect.selectedIndex];
                const imageUrl = selectedBook.getAttribute("data-image");
                bookImagePreview.src = imageUrl;
            });

            quantityInput.addEventListener("input", updateTotal);

            updateTotal(); // Atualiza ao carregar a página
        });
    </script>

</body>
</html>
