// scripts.js

document.getElementById('clienteForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('register_cliente.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => alert(data))
    .catch(error => console.error('Error:', error));
});

document.getElementById('autoForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('register_auto.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => alert(data))
    .catch(error => console.error('Error:', error));
});

function fetchInterventi() {
    fetch('fetch_interventi.php')
    .then(response => response.json())
    .then(data => {
        const tableBody = document.querySelector('#interventiTable tbody');
        tableBody.innerHTML = '';

        data.forEach(intervento => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${intervento.IDIntervento}</td>
                <td>${intervento.Data}</td>
                <td>${intervento.Durata}</td>
                <td>${intervento.Descrizione}</td>
                <td>${intervento.Targa}</td>
            `;
            tableBody.appendChild(row);
        });
    })
    .catch(error => console.error('Error:', error));
}

