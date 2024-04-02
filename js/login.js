document.addEventListener("DOMContentLoaded", function() {
	var overlay = document.getElementById('overlay');
	var modal = document.getElementById('loginModal');
	
	fetch("http://192.168.1.17:8000/verifLogin.php").then(response =>{
		if(response.ok)
			return response.json();
	}).then(data => {
		console.log(data);
		if(!data) {
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
					fetch("http://192.168.1.17:8000/verifLogin.php", {
						method: 'POST',
						body: JSON.stringify({ login: username, mdp: password }),
						headers: {
							'Content-Type': 'application/json'
						}
					})
					.then(response => response.json())
					.then(data => {
						if(data) {
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
});