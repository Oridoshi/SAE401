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
   // mode : 'no-cors',
    headers: {
        'Content-Type': 'application/json' // Type de contenu de la requête
    },
    body: JSON.stringify({ action: 'creerPDF', parametre: document.documentElement }) // Données à envoyer au serveur, si nécessaire
};

function envoyer() {
    fetch('http://192.168.1.17:8000/ExportPDF.php', requestOptions )
	.then(response => {
		if (response.ok) {
			console.log('Fichier téléchargé avec succès !');
            return response.text();
		} else {
			console.error('Une erreur s\'est produite lors du téléchargement du fichier : ', response.status, ' - ', response.statusText);
            console.log(response);
		}
	}).then(data => {
        const url = "../php/" + data;
        const link = document.createElement('a');
link.href = url;

// Définir l'attribut download pour forcer le téléchargement
link.download = 'example.pdf';

// Ajouter l'élément d'ancre au document
document.body.appendChild(link);

// Cliquer sur l'élément d'ancre pour déclencher le téléchargement
link.click();

// Supprimer l'élément d'ancre après le téléchargement
document.body.removeChild(link);

    })
	.catch(error => {
		console.error('Une erreur s\'est produite :', error);
	});

}