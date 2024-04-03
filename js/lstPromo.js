$btnPromo = document.getElementById('btnPromo');
$lstPromo = document.getElementById('lstPromo');

fetch("http://192.168.1.17:8000/annee.php").then(response => { 
    if(response.ok)
        return response.json();
    throw new Error('Network response was not ok.');
}).then(data => {
    data.forEach(annee => {
        let option = document.createElement('option');
        option.textContent = annee;
        let option2 = document.createElement('option');
        option2.textContent = annee;
        $btnPromo.appendChild(option);
        $lstPromo.appendChild(option2);
    });
});
