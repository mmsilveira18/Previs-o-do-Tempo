document.addEventListener('DOMContentLoaded', function() {
    // Enviar o formulário e obter o clima
    document.getElementById('weatherForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const cidade = document.getElementById('cidade').value;

        // Verificar se a cidade foi fornecida
        if (cidade.trim() === '') {
            document.getElementById('weather').innerHTML = `<div class="alert alert-warning">Por favor, insira o nome da cidade.</div>`;
            return;
        }

        // Buscar o clima para a cidade fornecida
        fetch(`http://localhost/weather.php?cidade=${encodeURIComponent(cidade)}`)
            .then(response => response.json())
            .then(data => {
                let weatherHtml = '';
                if (data.error) {
                    weatherHtml = `<div class="alert alert-danger">${data.error}</div>`;
                } else {
                    weatherHtml = `
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">${data.name}</h5>
                                <p class="card-text">Temperatura: ${data.main.temp} °C</p>
                                <p class="card-text">Descrição: ${data.weather[0].description}</p>
                                <p class="card-text">Vento: ${data.wind.speed} m/s</p>
                                <p class="card-text">Umidade: ${data.main.humidity} %</p>
                            </div>
                        </div>
                    `;
                }
                document.getElementById('weather').innerHTML = weatherHtml;
            })
            .catch(error => {
                document.getElementById('weather').innerHTML = `<div class="alert alert-danger">Ocorreu um erro: ${error.message}</div>`;
            });
    });
});
