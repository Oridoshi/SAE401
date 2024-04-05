function enTete(){

}

function corpsFixe(){
	let tbody = document.getElementById("tbodyFixe");

	fetch("http://localhost:8000/tabFixe.php").then(response => {
		return response.json();
	}).then(data => {
		let cpt = 0;
		data.forEach(etu => {
			let tr = document.createElement('tr');
			let avis = document.createElement('td');
			let code = document.createElement('td');
			let rang = document.createElement('td');
			let nom = document.createElement('td');
			let prenom = document.createElement('td');

			avis.textContent = etu.avis;
			avis.classList.add("border-r", "border-black");
			code.textContent = etu.code_etu;
			code.classList.add("border-r", "border-black");
			rang.textContent = etu.rang;
			rang.classList.add("border-r", "border-black");
			nom.textContent = etu.nom;
			nom.classList.add("border-r", "border-black");
			prenom.textContent = etu.prenom;
			prenom.classList.add("border-r", "border-white");

			if(cpt%2 == 0){
				tr.classList.add("bg-vertFonce");
			} else {
				tr.classList.add("bg-vertClair");
			}

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