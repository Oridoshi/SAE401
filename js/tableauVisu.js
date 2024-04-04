function enTete(){

}

function corpsFixe(){
	$tbody = document.getElementById("tbodyFixe");

	fetch("http://localhost:8000/tabFixe.php").then(response => {
		return response.json();
	}).then(data => {
		let cpt = 0;
		data.forEach(etu => {
			console.log(etu);
			$tr = document.createElement('tr');
			$avis = document.createElement('td');
			$code = document.createElement('td');
			$rang = document.createElement('td');
			$nom = document.createElement('td');
			$prenom = document.createElement('td');

			$avis.textContent = etu.avis;
			$code.textContent = etu.code_etu;
			$rang.textContent = etu.rang;
			$nom.textContent = etu.nom;
			$prenom.textContent = etu.prenom;

			if(cpt%2 == 0){
				$tr.addClass = "bg-vertFonce";
			} else {
				$tr.addClass = "bg-vertClair";
			}

			$tr.appendChild($avis);
			$tr.appendChild($code);
			$tr.appendChild($rang);
			$tr.appendChild($nom);
			$tr.appendChild($prenom);

			$tbody.appendChild($tr);
			cpt++;
		});
	});

}

function corpsScroll(){
    
}

enTete();
corpsFixe();
corpsScroll();