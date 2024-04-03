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
    var contenuHTML = document.documentElement.outerHTML;

    // Envoyer le contenu HTML à votre script PHP via Fetch
    fetch('http://192.168.1.17:8000/ExportPDF.php', {
        method: 'POST',
        body: JSON.stringify({ contenuHTML: contenuHTML }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        // Créer un objet jsPDF
        const doc = new jsPDF();

        // Ajouter les données reçues du serveur au PDF
        doc.text(data.content, 10, 10);

        // Télécharger le PDF
        doc.save("fichier.pdf");
    })
    .catch(error => console.error('Erreur:', error));
}
