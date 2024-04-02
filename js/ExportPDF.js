var btnTel = document.getElementById("telecharge");
var btnAnnule = document.getElementById("annule");
var divBtn = document.getElementById("divBtn");
btnTel.addEventListener("click", function(){
    divBtn.innerHTML =  " ";
    envoyer();
});

btnAnnule.addEventListener("click", function () {
    window.history.back();
});

const requestOptions = {
    method: 'POST', // Méthode HTTP à utiliser (POST ou GET)
    headers: {
        'Content-Type': 'application/json' // Type de contenu de la requête
    },
    body: JSON.stringify({ action: 'creerPDF', parametre: document }) // Données à envoyer au serveur, si nécessaire
};

function envoyer() {
    fetch('http://192.168.1.17/ExportPDF.php',{ mode: 'no-cors' }, requestOptions )
	.then(response => {
		if (response.ok) {
			console.log('Fichier téléchargé avec succès !');
		} else {
			console.error('Une erreur s\'est produite lors du téléchargement du fichier.');
		}
	})
	.catch(error => {
		console.error('Une erreur s\'est produite :', error);
	});

}