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

		if (username.trim() === '' || password.trim() === '') {
			alert('Veuillez saisir un nom d\'utilisateur et un mot de passe.');
		} else {
			if(username === 'admin' && password === 'admin') {
				overlay.classList.add('hidden');
				modal.classList.add('hidden');
			} else if(username === 'user' && password === 'user'){
				overlay.classList.add('hidden');
				modal.classList.add('hidden');
			} else {
				alert('Nom d\'utilisateur ou mot de passe incorrect.');
			}
		}
	});

	// overlay.addEventListener('click', function() {
	// 	overlay.classList.add('hidden');
	// 	modal.classList.add('hidden');
	// });
});