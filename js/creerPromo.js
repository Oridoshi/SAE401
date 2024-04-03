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
			let option = document.createElement('a');   
			option.classList.add('flex', 'items-center', 'h-8', 'px-3', 'text-sm', 'bg-vertFonce', 'hover:bg-vertClair', 'hover:text-black', 'border', 'border-black');
			option.textContent = promo;
			option.addEventListener('click', function() {
				document.getElementById('dropdownText').textContent = promo;
				document.getElementById('dropdownList').classList.add('hidden');
			});
			document.getElementById('dropdownList').appendChild(option);

			fetch('script.php', {
			method: 'POST',
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({ annee: promo })
			}).then(response => {
				if (!response.ok) {
					throw new Error('Network response was not ok');
				}
				return response.json();
			}).then(data => {
				console.log(data);
			}).catch(error => {
				console.error('There was a problem with the fetch operation:', error);
			});

		}
	});

	overlay.addEventListener('click', function() {
		overlay.classList.add('hidden');
		modal.classList.add('hidden');
	});
});