let estComm = document.getElementById("previ").value === "1";
changePrevi();
document.getElementById("previ").addEventListener('change', function(){
	estComm = !estComm;
	changePrevi();
});
function changePrevi() {
	let tbody = document.getElementById("tbodyFixe");
	let tbodyScroll = document.getElementById("tbodyScroll");
	let theadScroll = document.getElementById("theadScroll");

	tbody.innerHTML = '';
	tbodyScroll.innerHTML = '';
	theadScroll.innerHTML = '';

	let semmestre = document.getElementById("semmestre").value;
	let annee = document.getElementById("lstPromo").value;
	if(annee === ""){
		annee = 1976;
	}
	console.log(annee);

	/*thead scroll */
	let trHead = document.createElement('tr');

	if(estComm){
		let thRCUEs = document.createElement('th');
		thRCUEs.textContent = "RCUEs";
		thRCUEs.classList.add("border-r", "border-black", "text-white","sticky", "top-0", "text-center", "font-bold", "p-4", "bg-marronFonce");
		trHead.appendChild(thRCUEs);
		let thCursus = document.createElement('th');
		thCursus.textContent = "Cursus";
		thCursus.classList.add("border-r", "border-black", "text-white","sticky", "top-0", "text-center", "font-bold", "p-4", "bg-marronFonce");
		trHead.appendChild(thCursus);
		let thMoyenne = document.createElement('th');
		thMoyenne.textContent = "Moy";
		thMoyenne.classList.add("border-r", "border-black", "text-white","sticky", "top-0", "text-center", "font-bold", "p-4", "bg-marronFonce");
		trHead.appendChild(thMoyenne);

	} else {
			
		let thParcours = document.createElement('th');
		thParcours.textContent = "Parcours";
		thParcours.classList.add("border-r", "border-black", "text-white","sticky", "top-0", "text-center", "font-bold", "p-4", "bg-marronFonce");
		trHead.appendChild(thParcours);
		let thCursus = document.createElement('th');
		thCursus.textContent = "Cursus";
		thCursus.classList.add("border-r", "border-black", "text-white","sticky", "top-0", "text-center", "font-bold", "p-4", "bg-marronFonce");
		trHead.appendChild(thCursus);

		for (let i = 1; i <= 6; i++) {
			let thC = document.createElement('th');
			thC.textContent = "C" + i;
			thC.classList.add("border-r", "border-black", "text-white","sticky", "top-0", "text-center", "font-bold", "p-4", "bg-marronFonce");
			trHead.appendChild(thC);
		}
		let thRCUEs = document.createElement('th');
		thRCUEs.textContent = "RCUEs";
		thRCUEs.classList.add("border-r", "border-black", "text-white","sticky", "top-0", "text-center", "font-bold", "p-4", "bg-marronFonce");
		trHead.appendChild(thRCUEs);

		for (let i = 1; i <= 6; i++) {
			let thB = document.createElement('th');
			thB.textContent = "BIN" + semmestre + i;
			thB.classList.add("border-r", "border-black", "text-white","sticky", "top-0", "text-center", "font-bold", "p-4", "bg-marronFonce");
			trHead.appendChild(thB);
		}
		let thMoyenne = document.createElement('th');
		thMoyenne.textContent = "Moy";
		thMoyenne.classList.add("border-r", "border-black", "text-white","sticky", "top-0", "text-center", "font-bold", "p-4", "bg-marronFonce");
		trHead.appendChild(thMoyenne);
	}

	theadScroll.appendChild(trHead);

	fetch("http://localhost:8000/tabFixe.php?annee=" + annee).then(response => {
		return response.json();
	}).then(data => {
		let cpt = 0;
		data.forEach(etu => {
			let tr = document.createElement('tr');
			let modif = document.createElement('td');
			let avis = document.createElement('td');
			let code = document.createElement('td');
			let rang = document.createElement('td');
			let nom = document.createElement('td');
			let prenom = document.createElement('td');

			modif.classList.add("bg-white");
			modif.addEventListener('mouseout', function(){
				modif.innerHTML = '';
			});
			
			modif.addEventListener('mouseover', function(){
				modif.innerHTML = '<img src="style/img/modif.png" alt="Modifier" width="30" height="30">'; 
			});
			
			modif.addEventListener('click', function(){
				//Code pour modifier la partie scroll
			});
			avis.textContent = etu[9];
			avis.classList.add("border-r", "border-black", "text-white");
			code.textContent = etu[0];
			code.classList.add("border-r", "border-black", "text-white");
			rang.textContent = etu[10];
			rang.classList.add("border-r", "border-black", "text-white");
			nom.textContent = etu[2];
			nom.classList.add("border-r", "border-black", "text-white");
			prenom.textContent = etu[3];
			prenom.classList.add("border-r", "border-white", "text-white");

			let trScroll = document.createElement('tr');
			if(cpt%2 == 0){
				tr.classList.add("bg-vertFonce");
				trScroll.classList.add("bg-vertFonce");
			} else {
				tr.classList.add("bg-vertClair");
				trScroll.classList.add("bg-vertClair");
			}

			tr.appendChild(modif);
			tr.appendChild(avis);
			tr.appendChild(code);
			tr.appendChild(rang);
			tr.appendChild(nom);
			tr.appendChild(prenom);

			tbody.appendChild(tr);

			
			if(estComm){

			} else {
				let parcours = document.createElement('td');
				parcours.textContent = etu[4];
				parcours.classList.add("border-r", "border-black", "text-white");
				trScroll.appendChild(parcours);
			}

			let cursus = document.createElement('td');
			cursus.textContent = etu[7];
			cursus.classList.add("border-r", "border-black", "text-white");
			trScroll.appendChild(cursus);

			tbodyScroll.appendChild(trScroll);

			let nbC = 0;

			fetch("http://localhost:8000/compEtu.php?code=" + etu[0] + "&semmestre=" + semmestre).then(response => {
				return response.json();
			}).then(data => {
				data.forEach(comp => {
					
					let td = document.createElement('td');
					td.textContent = comp[0].recommandation;
					td.classList.add("border-r", "border-black", "text-white");
					trScroll.appendChild(td);
					if(comp[0].recommandation === "ADM"){
						nbC++;
					}
				});
				let tdRCUEs = document.createElement('td');
				tdRCUEs.textContent = nbC + "/6";
				tdRCUEs.classList.add("border-r", "border-black", "text-white");
				trScroll.appendChild(tdRCUEs);

				let moye = 0;
				data.forEach(comp => {
					let moy = document.createElement('td');
					moy.textContent = comp[0].moyenne;
					moy.classList.add("border-r", "border-black", "text-white");
					trScroll.appendChild(moy);
					moye += parseFloat(comp[0].moyenne);
				});

				let moyenne = document.createElement('td');
				moyenne.textContent = (moye / 6).toFixed(2);
				moyenne.classList.add("border-r", "border-black", "text-white");
				trScroll.appendChild(moyenne);
			});


			cpt++;
		});
	});

	fetch("http://localhost:8000/tabEnTete.php").then(response => {
		return response.json();
	}).then(data => {
		//si moyenne sinon jury
		if(estComm){

		} else {

		}
	});
}