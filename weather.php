<?php
// Carregar a configuração
$config = include('config.php');

// Usar a chave da API
$apiKey = $config['api_key'];

// Código para obter dados do clima usando a chave da API
if (isset($_GET['cidade'])) {
    $cidade = urlencode($_GET['cidade']);
    $url = "https://api.openweathermap.org/data/2.5/weather?q=$cidade&appid=$apiKey&units=metric";

    $climaData = file_get_contents($url);

    if ($climaData) {
        $data = json_decode($climaData, true);
    } else {
        $data = ['error' => 'Não foi possível obter os dados do clima.'];
    }
} else {
    $data = ['error' => 'Por favor, forneça o nome da cidade.'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Clima</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Informações do Clima</h1>
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0"><?php echo htmlspecialchars($data['name']); ?></h2>
            </div>
            <div class="card-body">
                <?php if (isset($data['error'])): ?>
                    <div class="alert alert-danger"><?php echo htmlspecialchars($data['error']); ?></div>
                <?php else: ?>
                    <p class="lead">Temperatura: <strong><?php echo htmlspecialchars($data['main']['temp']); ?> °C</strong></p>
                    <p>Descrição: <?php echo htmlspecialchars($data['weather'][0]['description']); ?></p>
                    <p>Vento: <?php echo htmlspecialchars($data['wind']['speed']); ?> m/s</p>
                    <p>Umidade: <?php echo htmlspecialchars($data['main']['humidity']); ?> %</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-primary" id="voltar-btn">Voltar</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('voltar-btn').addEventListener('click', function() {
            if (document.referrer) {
                window.location.href = document.referrer;
            }
        });
    </script>
</body>
</html>
