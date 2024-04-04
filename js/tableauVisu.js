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
			let avis = document.createElement('td');
			let code = document.createElement('td');
			let rang = document.createElement('td');
			let nom = document.createElement('td');
			let prenom = document.createElement('td');

			avis.textContent = etu.avis;
			code.textContent = etu.code_etu;
			rang.textContent = etu.rang;
			nom.textContent = etu.nom;
			prenom.textContent = etu.prenom;

			if(cpt%2 == 0){
				tr.addClass = "bg-vertFonce";
			} else {
				tr.addClass = "bg-vertClair";
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