<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta do Clima</title>
    <!-- Incluindo o CSS do Bootstrap e o CSS personalizado -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Consulta do Clima</h1>
        <div class="d-flex justify-content-center">
            <form id="clima-form" action="weather.php" method="get" class="text-center">
                <div class="form-group">
                <input type="text" id="cidade" name="cidade" class="form-control mx-auto mb-2" placeholder="Digite o nome da cidade" required style="max-width: 400px;">

                </div>
                <button type="submit" class="btn btn-primary">Consultar</button>
            </form>
        </div>
    </div>

    <!-- Incluindo o JavaScript do Bootstrap e o JavaScript personalizado -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
