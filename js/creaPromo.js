btnCreaPromo = document.getElementById('creerPromo');

btnCreaPromo.addEventListener("click", function() {
	var overlay = document.getElementById('overlay');
	var modal   = document.getElementById('creaPromoModal');
	overlay.classList.remove('hidden');
	modal.classList.remove('hidden');

	var creaPromoForm = document.getElementById('creaPromoForm');
	creaPromoForm.addEventListener('submit', function(event) {
		event.preventDefault();
		var promo = document.getElementById('promo').value;

		if (promo.trim() === '') {
			alert('Veuillez saisir un nom d\'utilisateur et un mot de passe.');
		} else {
			//mettre le code pour creer la promo
		}
	});

	overlay.addEventListener('click', function() {
		overlay.classList.add('hidden');
		modal.classList.add('hidden');
	});
});