btnCreerPromo = document.getElementById('creerPromo');

btnCreerPromo.addEventListener("click", function() {
	console.log('creerPromo');
	var overlay = document.getElementById('overlay');
	var modal   = document.getElementById('creerPromoModal');
	overlay.classList.remove('hidden');
	modal.classList.remove('hidden');

	var creerPromoForm = document.getElementById('creerPromoForm');
	creerPromoForm.addEventListener('submit', function(event) {
		event.preventDefault();
		var promo = document.getElementById('promo').value;

		if (promo.trim() === '') {
			alert('Veuillez saisir une valeur valide.');
		} else {
			overlay.classList.add('hidden');
			modal.classList.add('hidden');
			let option = document.createElement('option');   
			option.textContent = promo;
		
			const btnPromo = document.getElementById('btnPromo');
			btnPromo.appendChild(option);
			btnPromo.value = promo;

		}
	});

	overlay.addEventListener('click', function() {
		overlay.classList.add('hidden');
		modal.classList.add('hidden');
	});
});