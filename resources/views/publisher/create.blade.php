<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação Editora</title>

    <!-- Link para o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Criação de Editora</h2>

            <!-- Formulário para criação de editora -->
            <form action="{{ route('publisher-store') }}" method="POST">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="name" class="form-label">Nome da Editora</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nome completo" value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-50">Cadastrar Editora</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
