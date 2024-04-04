function enTete(){

}

function corpsFixe(){
	let tbody = document.getElementById("tbodyFixe");

	fetch("http://localhost:8000/tabFixe.php").then(response => {
		return response.json();
	}).then(data => {
		let cpt = 0;
		data.forEach(etu => {
			console.log(etu);
			let tr = document.createElement('tr');
			let modif = document.createElement('td');
			let avis = document.createElement('td');
			let code = document.createElement('td');
			let rang = document.createElement('td');
			let nom = document.createElement('td');
			let prenom = document.createElement('td');

			modif.classList.add("bg-white");
			modif.addEventListener('mouseout', function(){
				modif.innerHTML = ''; // Supprime le contenu de la cellule de l'icône
			});
			
			// Ajouter des écouteurs d'événements pour afficher l'icône de modification au survol de la souris
			modif.addEventListener('mouseover', function(){
				modif.innerHTML = '<img src="style/img/icon.png" alt="Modifier" width="20" height="20">'; // Restaure le contenu de la cellule de l'icône
			});
			
			modif.addEventListener('click', function(){
				console.log("Modifier");
				//Code pour modifier la partie scroll
			});
			avis.textContent = etu.avis;
			avis.classList.add("border-r", "border-black", "text-white");
			code.textContent = etu.code_etu;
			code.classList.add("border-r", "border-black", "text-white");
			rang.textContent = etu.rang;
			rang.classList.add("border-r", "border-black", "text-white");
			nom.textContent = etu.nom;
			nom.classList.add("border-r", "border-black", "text-white");
			prenom.textContent = etu.prenom;
			prenom.classList.add("border-r", "border-white", "text-white");

			if(cpt%2 == 0){
				tr.classList.add("bg-vertFonce");
			} else {
				tr.classList.add("bg-vertClair");
			}

			tr.appendChild(modif);
			tr.appendChild(avis);
			tr.appendChild(code);
			tr.appendChild(rang);
			tr.appendChild(nom);
			tr.appendChild(prenom);

			tbody.appendChild(tr);
			cpt++;
		});
	});

}

function corpsScroll(){
    
}

enTete();
corpsFixe();
corpsScroll();