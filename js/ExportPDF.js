var btnTel = document.getElementById("telecharge");
var btnAnnule = document.getElementById("annule");
var divBtn = document.getElementById("divBtn");
console.log("arriver dans js");
btnTel.addEventListener("click", function(){
    divBtn.innerHTML =  " ";
    console.log("ff");
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
    console.log("envoie fct");
    fetch('http://192.168.1.17/ExportPDF.php', requestOptions)
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