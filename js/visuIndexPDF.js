document.addEventListener("DOMContentLoaded", function() {
	if(sessionStorage.getItem('estCo') !== null) {
		document.getElementById("exportAvis").addEventListener("click", function(){
			var id_etu = 8860;
			fetch('http://localhost:8000/ExportPDF.php', {
				method: 'POST',
				body: JSON.stringify({ id_etu : id_etu }),
				headers: {
					'Content-Type': 'application/json'
				}
				}).then(response => response.json())
				.then(data => {
				
				console.log(data);






				}).catch(error => console.error("erreur lors de la récupération des données " + error.value));
				//window.location.href = './visuPdf.html';
				open("./visuPdf.html");
			});
	}
		/*
		titre : année de la promo
		nomPrenom : NOM - Prénom
		alt1, alt2, alt3 : apprentissage par année -> créer textfield
		parcours-2, parcours-1, parcours-0 : parcours d'études par années
		parcoursBUT : parcours A, B ou C
		erasmus : Si mobilité à l'étranger (lieu, durée) 

		moy1X : avec X de 1 à 8, moyenne au S1 pour UEX
		rang1X : avec X de 1 à 8, rang au S1 pour UEX
		moy2X : avec X de 1 à 8, moyenne au S2 pour UEX
		rang2X : avec X de 1 à 8, rang au S2 pour UEX
		absS1 : nb d'absences au S1
		absS2 : nb d'absences au S2
		
		moy3x : avec X de 1 à 7, moyenne au S5/3ème année pour UEX
		rang3x : avec X de 1 à 7, rang au S5/3ème année pour UEX
		absS5 : nb d'absences au S5/3ème année 
		nbEleves : nombre d'avis pour la promotion
		
		*/
});