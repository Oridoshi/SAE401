var btnTel = document.getElementById("telecharge");
var btnAnnule = document.getElementById("annule");
var divBtn = document.getElementById("divBtn");
var btnImage1 = document.getElementById("inputLogo1");
var btnImage2 = document.getElementById("inputLogo2");
var btnImage3 = document.getElementById("inputImage");

btnTel.addEventListener("click", function(){
	divBtn.innerHTML =  " ";
	btnImage1.remove();
	btnImage2.remove();
	btnImage3.remove();
	valider();
});

btnAnnule.addEventListener("click", function () {
    window.history.back();
});


function valider() {
	const jsonData = {};
	const dataDiv = document.getElementById('data');
	const elements = dataDiv.querySelectorAll('*');

	elements.forEach(element => {
		const id = element.id;
		const tagName = element.tagName.toLowerCase();
		const content = element.innerHTML.trim();

		if (tagName === 'input' || tagName === 'textarea') {
			jsonData[id] = element.value;
		} else if (tagName === 'img') {
			const src = element.src;
			jsonData[id] = src;
		} else {
			jsonData[id] = content;
		}
	});

	// Convertir l'objet JSON en chaîne JSON
	const jsonString = JSON.stringify(jsonData);

	// Créer un nouvel objet jsPDF
	const doc = new jsPDF();

	// Ajouter le contenu JSON au PDF
	doc.text(jsonString, 10, 10);

	// Télécharger le PDF
	doc.save('fichier.pdf');
}


function envoyer() {
    // Récupérer le contenu HTML que vous souhaitez convertir en PDF
    var contenuHTML = document.documentElement.outerHTML;

	// Envoyer le contenu HTML à votre script PHP via Fetch
	fetch('http://localhost:8000/ExportPDF.php', {
		method: 'POST',
		body: JSON.stringify({ contenuHTML: contenuHTML }),
		headers: {
			'Content-Type': 'application/json'
		}
	})
	.then(response => response.json())
	.then(data => {
		console.log(data);
		 // Créer un objet jsPDF
		 const doc = new jsPDF();

		 // Ajouter les données reçues du serveur au PDF
		 doc.text(data.content, 10, 10);

		 // Télécharger le PDF
		 doc.save("fichier.pdf");
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