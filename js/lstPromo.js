$btnPromo = document.getElementById('btnPromo');
$lstPromo = document.getElementById('lstPromo');
$xlsPromo = document.getElementById('exportExelPromo');

fetch("http://localhost:8000/annee.php").then(response => { 
    if(response.ok)
        return response.json();
    throw new Error('Network response was not ok.');
}).then(data => {
    data.forEach(annee => {
        let option = document.createElement('option');
        option.textContent = annee;
        let option2 = document.createElement('option');
        option2.textContent = annee;
        option2.value = annee;
        console.log(option2.value);
        let option3 = document.createElement('option');
        option3.textContent = annee;
        $btnPromo.appendChild(option);
        $lstPromo.appendChild(option2);
        $xlsPromo.appendChild(option3);
    });
});
