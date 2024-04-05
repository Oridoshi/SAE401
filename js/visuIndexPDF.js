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
					var n1 = data[0].annee + 1;
					var n = data[0].annee + 2;
		
					var html = '<!DOCTYPE html>\
								<html lang="fr">\
								<head>\
								<meta charset="UTF-8">\
								<meta name="viewport" content="width=device-width, initial-scale=1.0">\
								<title>Document</title>\
								<style>\
								body {\
								font-family: Arial, sans-serif;\
								font-size: 12px;\
								}\
								table {\
								border-collapse: collapse;\
								width: 750px;\
								}\
								th, td {\
								border: 1px solid black;\
								}\
								td {\
								min-width: auto;\
								}\
								.content {\
								width: 450px;\
								height: 50px;\
								margin: auto;\
								float: center;\
								}\
								.marge {\
								min-width: 40px;\
								}\
								hr {\
								border: none;\
								height: 2px;\
								background-color: black;\
								}\
								.invisible {\
								border: none;\
								}\
								.nonGras {\
								font-weight: normal;\
								text-align: left;\
								}\
								.nonGrasCentre {\
								font-weight: normal;\
								}\
								.barrer {\
								text-decoration: line-through;\
								}\
								.droite {\
								float: right;\
								}\
								p {\
								margin-top: 5px;\
								margin-bottom: 5px;\
								}\
								input[type="text"] {\
								transform: scale(1.5);\
								border: 1px solid black;\
								}\
								label {\
								margin-right: 10px;\
								}\
								#imageContainer img {\
								max-width: 200px;\
								max-height: 100px;\
								}\
								#logo1 img {\
								max-width: 150px;\
								max-height: 75px;\
								float: left;\
								}\
								#logo2 img {\
								max-width: 100px;\
								max-height: 100px;\
								float: right;\
								}\
								.coulGris {\
								background-color: lightgrey;\
								}\
								.divLogo1 {\
								float: left;\
								max-height: 75px;\
								}\
								.divLogo2 {\
								float: right;\
								max-height: 100px;\
								}\
								</style>\
								</head>\
								<body>\
								<div class="divLogo1">\
								<input type="file" accept="image/*" id="inputLogo1" title="signature du chef de Dept." name=".">\
								<div id="logo1"></div>\
								</div>\
								<div class="divLogo2">\
								<input type="file" accept="image/*" id="inputLogo2" title="signature du chef de Dept." name=".">\
								<div id="logo2"></div>\
								</div>\
								<br><br><br><br>\
								<div id="titre" class="content">\
								<p><b>Fiche Avis Poursuite d\'Études - Promotion ' + data[0].annee + '<br>\ ' + 
								'Département Informatique IUT Le Havre</b></p>\
								</div>\
								<div id="ficheInfoEtu">\
								<p><b>FICHE D\'INFORMATION ÉTUDIANT(E)</b> <hr></p>\
								<table>\
								<tr>\
								<th class="nonGras">NOM - Prénom :</th>\
								<td colspan="6" id="nomPrenom"> ' + data[0].nom + ' ' + data[0].prenom +  '  </td>\
								</tr>\
								<tr>\
								<th class="nonGras">Apprentissage : (oui/non) </th>\
								<td>BUT1</td>\
								<td id="alt1" class="marge"><input type="checkbox"></inpunt></td>\
								<td>BUT2</td>\
								<td id="alt2" class="marge"><input type="checkbox"></inpunt></td>\
								<td>BUT3</td>\
								<td id="alt3" class="marge"><input type="checkbox"></inpunt></td>\
								</tr>\
								<tr>\
								<th class="nonGras">Parcours d\'études</th>\
								<td>n-2</td>\
								<td id="parcours-2" class="marge"> ' + data[0].annee +  '</td>\
								<td>n-1</td>\
								<td id="parcours-1" class="marge"> ' + n1 +  '</td>\
								<td>n</td>\
								<td id="parcours-0" class="marge"> ' + n +  '</td>\
								</tr>\
								<tr>\
								<th class="nonGras">Parcours BUT</th>\
								<td colspan="6" class="marge" id="parcoursBUT"> ' + data[0].parcours +  '</td>\
								</tr>\
								<tr>\
								<th class="nonGras">Si mobilité à l\'étranger (lieu, durée) </th>\
								<td colspan="6" id="erasmus"></td>\
								</tr>\
								</table>\
								</div>\
								<br><br>\
								<div id="resCompetences">\
								<p><b>RÉSULTATS DES COMPÉTENCES</b> <hr></p>\
								<table>\
								<tr>\
								<th class="nonGras invisible"></th>\
								<th colspan="2" class="coulGris">BUT 1</th>\
								<th colspan="2" class="coulGris">BUT 2</th>\
								</tr>\
								<tr>\
								<th class="nonGras invisible"></th>\
								<td class="coulGris">Moy.</td>\
								<td class="coulGris">Rang</td>\
								<td class="coulGris">Moy.</td>\
								<td class="coulGris">Rang</td>\
								</tr>\
								<tr>\
								<th class="nonGras">UE1 - Réaliser des applications</th>\
								<td class="marge" id="moy11"></td>\
								<td class="marge" id="rang11"></td>\
								<td class="marge" id="moy21"></td>\
								<td class="marge" id="rang21"></td>\
								</tr>\
								<tr>\
								<th class="nonGras">UE2 - Optimiser des applications</th>\
								<td class="marge" id="moy12"></td>\
								<td class="marge" id="rang12"></td>\
								<td class="marge" id="moy22"></td>\
								<td class="marge" id="rang22"></td>\
								</tr>\
								<tr>\
								<th class="nonGras">UE3 - Administrer des projets</th>\
								<td class="marge" id="moy13"></td>\
								<td class="marge" id="rang13"></td>\
								<td class="marge" id="moy23"></td>\
								<td class="marge" id="rang23"></td>\
								</tr>\
								<tr>\
								<th class="nonGras">UE4 - Gérer des données</th>\
								<td class="marge" id="moy14"></td>\
								<td class="marge" id="rang14"></td>\
								<td class="marge" id="moy24"></td>\
								<td class="marge" id="rang24"></td>\
								</tr>\
								<tr>\
								<th class="nonGras">UE5 - Conduire des projets</th>\
								<td class="marge" id="moy15"></td>\
								<td class="marge" id="rang15"></td>\
								<td class="marge" id="moy25"></td>\
								<td class="marge" id="rang25"></td>\
								</tr>\
								<tr>\
								<th class="nonGras">UE6 - Collaborer</th>\
								<td class="marge" id="moy16"></td>\
								<td class="marge" id="rang16"></td>\
								<td class="marge" id="moy26"></td>\
								<td class="marge" id="rang26"></td>\
								</tr>\
								<tr>\
								<th class="nonGras">Maths</th>\
								<td class="marge" id="moy17"></td>\
								<td class="marge" id="rang17"></td>\
								<td class="marge" id="moy27"></td>\
								<td class="marge" id="rang27"></td>\
								</tr>\
								<tr>\
								<th class="nonGras">Anglais</th>\
								<td class="marge" id="moy18"></td>\
								<td class="marge" id="rang18"></td>\
								<td class="marge" id="moy28"></td>\
								<td class="marge" id="rang28"></td>\
								</tr>\
								<tr>\
								<th class="nonGras">Nombre d\'absences inustifiées</th>\
								<td colspan="2" id="absS1"></td>\
								<td colspan="2" id="absS2"></td>\
								</tr>\
								</table>\
								<br><br>\
								<table>\
								<tr>\
								<th class="invisible"></th>\
								<th colspan="2" class="coulGris">BUT 3 - S5</th>\
								</tr>\
								<tr>\
								<th class="nonGras invisible"></th>\
								<td class="coulGris">Moy.</td>\
								<td class="coulGris">Rang</td>\
								</tr>\
								<tr>\
								<th class="nonGras">UE1 - Réaliser des applications</th>\
								<td class="marge" id="moy31"></td>\
								<td class="marge" id="rang31"></td>\
								</tr>\
								<tr>\
								<th class="nonGras">UE2 - Optimiser des applications</th>\
								<td class="marge" id="moy32"></td>\
								<td class="marge" id="rang32"></td>\
								</tr>\
								<tr>\
								<th class="nonGras barrer">UE3 - Administrer des projets</th>\
								<td class="marge" id="moy33"></td>\
								<td class="marge" id="rang33"></td>\
								</tr>\
								<tr>\
								<th class="nonGras barrer">UE4 - Gérer des données</th>\
								<td class="marge" id="moy34"></td>\
								<td class="marge" id="rang34"></td>\
								</tr>\
								<tr>\
								<th class="nonGras barrer">UE5 - Conduire des projets</th>\
								<td class="marge" id="moy35"></td>\
								<td class="marge" id="rang35"></td>\
								</tr>\
								<tr>\
								<th class="nonGras">UE6 - Collaborer</th>\
								<td class="marge" id="moy36"></td>\
								<td class="marge" id="rang36"></td>\
								</tr>\
								<tr>\
								<th class="nonGras">Maths</th>\
								<td class="marge" id="moy37"></td>\
								<td class="marge" id="rang37"></td>\
								</tr>\
								<tr>\
								<th class="nonGras">Nombre d\'absences inustifiées</th>\
								<td colspan="2" id="absS5"></td>\
								</tr>\
								</table>\
								</div>\
								<br><br>\
								<div id="avisEquipePedago">\
								<p><b>Avis de l\'équipe pédagogique pour la poursuite d\'études après le BUT3</b><hr></p>\
								<table>\
								<tr>\
								<td class="marge"></td>\
								<td class="marge"></td>\
								<th class="nonGrasCentre"> Très <br> Favorable</th>\
								<th class="nonGrasCentre"> Favorable</th>\
								<th class="nonGrasCentre"> Assez <br> Favorable</th>\
								<th class="nonGrasCentre"> Sans avis</th>\
								<th class="nonGrasCentre"> Réservé</th>\
								</tr>\
								<tr>\
								<th class="nonGrasCentre" rowspan="2"> Pour l\'étudiant</th>\
								<td>En école <br> d\'ingénieurs</td>\
								<td><input type="radio" name="l1"></td>\
								<td><input type="radio" name="l1"></td>\
								<td><input type="radio" name="l1"></td>\
								<td><input type="radio" name="l1"></td>\
								<td><input type="radio" name="l1"></td>\
								</tr>\
								<tr>\
								<td>En master</td>\
								<td><input type="radio" name="l2"></td>\
								<td><input type="radio" name="l2"></td>\
								<td><input type="radio" name="l2"></td>\
								<td><input type="radio" name="l2"></td>\
								<td><input type="radio" name="l2"></td>\
								</tr>\
								<tr>\
								<th class="nonGrasCentre" rowspan="2">Nombre d\'avis <br> pour la <br> promotion <br><p id="nbEleves">(total : 52 )</p></th>\
								<td>En école <br> d\'ingénieurs</td>\
								<td class="marge"></td>\
								<td class="marge"></td>\
								<td class="marge"></td>\
								<td class="marge"></td>\
								<td class="marge"></td>\
								</tr>\
								<tr>\
								<td>En master</td>\
								<td class="marge"></td>\
								<td class="marge"></td>\
								<td class="marge"></td>\
								<td class="marge"></td>\
								<td class="marge"></td>\
								</tr>\
								<tr>\
								<th class="nonGrasCentre">commentaire</th>\
								<td colspan="6"></td>\
								</tr>\
								</table>\
								</div>\
								<div id="signature" class="droite">\
								<label>Signature du Chef de Département <br><br></label>\
								<input type="text" id="signature" placeholder="">\
								<br><br>\
								<input type="file" accept="image/*" id="inputImage" title="signature du chef de Dept." name=".">\
								<div id="imageContainer"></div>\
								</div>\
								<div id="divBtn">\
								<button id="telecharge">Télécharge</button>\
								<button id="annule">Annule</button>\
								</div>\
								</body>\
								</html>';
		
					console.log(html);
					console.log(data);
					// Créer un Blob à partir du contenu HTML
					var blob = new Blob([html], { type: 'text/html' });
		
					// Créer une URL à partir du Blob
					var url = URL.createObjectURL(blob);
		
					// Ouvrir l'URL dans un nouvel onglet
					window.open(url);
		
					// Libérer la mémoire après l'ouverture du nouvel onglet
					URL.revokeObjectURL(url);




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