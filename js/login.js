document.addEventListener("DOMContentLoaded", function() {
	if(sessionStorage.getItem('login') !== null) {
		console.log('Utilisateur connecté :', sessionStorage.getItem('login'));
		console.log('hey : ', sessionStorage.getItem('data'));
	}
	else {
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
				fetch("http://127.0.0.1:8000/verifLogin.php", {
					method: 'POST',
					body: JSON.stringify({ login: username, mdp: password }),
					headers: {
						'Content-Type': 'application/json'
					}
				})
				.then(response => response.json())
				.then(data => {
					if(data) {
						sessionStorage.setItem('login', username);
						overlay.classList.add('hidden');
						modal.classList.add('hidden');
					} else {
						alert('Nom d\'utilisateur ou mot de passe incorrect.');
					}
				})
				.catch(error => {
					console.error('Erreur:', error);
				});
			}
		});
	}
});