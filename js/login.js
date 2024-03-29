document.addEventListener("DOMContentLoaded", function() {
	var overlay = document.getElementById('overlay');
	var modal = document.getElementById('loginModal');
	overlay.classList.remove('hidden');
	modal.classList.remove('hidden');

	var loginForm = document.getElementById('loginForm');
	loginForm.addEventListener('submit', function(event) {
		event.preventDefault();
		var username = document.getElementById('username').value;
		var password = document.getElementById('password').value;

		// Vous pouvez implémenter ici la logique de vérification du login et du mot de passe
		
		// Exemple simple : vérifier si les champs ne sont pas vides
		if (username.trim() === '' || password.trim() === '') {
			alert('Veuillez saisir un nom d\'utilisateur et un mot de passe.');
		} else {
			alert('Login réussi avec username: ' + username + ' et password: ' + password);
			overlay.classList.add('hidden');
			modal.classList.add('hidden');
		}
	});

	overlay.addEventListener('click', function() {
		overlay.classList.add('hidden');
		modal.classList.add('hidden');
	});
});