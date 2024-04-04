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

function envoyer() {
	// Récupérer le contenu HTML que vous souhaitez convertir en PDF
	
	var contenuHTML = document.documentElement;
    //var nomPrenom = document.getElementById("exportExcelSemestre").value;

	// Envoyer le contenu HTML à votre script PHP via Fetch
	fetch('http://localhost:8000/ExportPDF.php', {
		method: 'POST',
		body: JSON.stringify({ contenuHTML: contenuHTML, /*nomPrenom: nomPrenom*/ }),
		headers: {
			'Content-Type': 'application/json'
		}
	})
	.then(response => response.blob())
	.then(blob => {
		// Récupérer le blob (PDF) et le télécharger ou l'afficher
		var url = window.URL.createObjectURL(blob);
		window.open(url); // Ouvre le PDF dans un nouvel onglet
	})
	.catch(error => console.error('Erreur:', error));
};



//possible de récupérer les noms des élèves directement lors de l'envoi par le php !
function listerNoms() {
	var lstNoms = [];
	var tableau = document.getElementById("TableauFixe");

	for (var i = 1; i < tableau.rows.length; i++) {
		var nom = tableau.rows[i].cells[3].innerHTML;
		var prenom = tableau.rows[i].cells[4].innerHTML;
		lstNoms.push({nomEleve: nom, prenomEleve: prenom});
	}
	return lstNoms;
}