<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Venda</title>
    <!-- Link do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script>
        function atualizarTotal(input, preco, totalId) {
            let quantidade = input.value;
            let total = preco * quantidade;
            document.getElementById(totalId).textContent = "R$ " + total.toFixed(2).replace(".", ",");
        }
    </script>

    <style>
        .container {
            margin-top: 30px;
        }

        .book-image-preview {
            max-width: 150px;
            height: auto;
        }

        .form-control {
            margin-bottom: 10px;
        }

        h1 {
            color: #343a40;
        }

        .card {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center mb-4">Criação de Venda</h1>

        <div class="card">
            <form action="{{ route('admsale-store') }}" method="POST">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="user_id" class="form-label">Comprador:</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        <option value="">Selecione um usuário</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="book_id" class="form-label">Livro:</label>
                    <select name="book_id" id="book_id" class="form-control" required>
                        <option value="">Selecione um livro</option>
                        @foreach($books as $book)
                            <option value="{{ $book->id }}" 
                                    data-price="{{ $book->sale_price }}" 
                                    data-stock="{{ $book->amount }}" 
                                    data-image="{{ asset('storage/' . $book->image) }}">
                                {{ $book->name }} (R$ {{ number_format($book->sale_price, 2, ',', '.') }} | Estoque: {{ $book->amount }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Exibição da imagem do livro -->
                <div id="book-image" class="mb-3" style="display: none;">
                    <h3>Imagem do Livro:</h3>
                    <img id="book-image-preview" class="book-image-preview" src="" alt="Imagem do Livro">
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantidade:</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantidade" value="{{ old('quantity') }}" min="1" required>
                </div>

                <div class="mb-3">
                    <label for="total_value" class="form-label">Valor Total:</label>
                    <input type="text" id="total_value" class="form-control" placeholder="Valor total" readonly>
                </div>

                <button type="submit" class="btn btn-success w-100">Finalizar Venda</button>
            </form>
        </div>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const bookSelect = document.getElementById("book_id");
            const quantityInput = document.getElementById("quantity");
            const totalValueInput = document.getElementById("total_value");
            const bookImagePreview = document.getElementById("book-image-preview");
            const bookImageDiv = document.getElementById("book-image");

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

                // Atualiza a imagem do livro
                const selectedBook = bookSelect.options[bookSelect.selectedIndex];
                const imageUrl = selectedBook.getAttribute("data-image");
                bookImagePreview.src = imageUrl;
                bookImageDiv.style.display = imageUrl ? 'block' : 'none';
            });

            quantityInput.addEventListener("input", updateTotal);
        });
    </script>

</body>
</html>
