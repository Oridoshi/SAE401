
const inputCommS1 = document.getElementById('commSemmestre1');
const inputJuryS1 = document.getElementById('jurySemmestre1');
const inputCommS2 = document.getElementById('commSemmestre2');
const inputJuryS2 = document.getElementById('jurySemmestre2');
const inputCommS3 = document.getElementById('commSemmestre3');
const inputJuryS3 = document.getElementById('jurySemmestre3');
const inputCommS4 = document.getElementById('commSemmestre4');
const inputJuryS4 = document.getElementById('jurySemmestre4');
const inputCommS5 = document.getElementById('commSemmestre5');
const inputJuryS5 = document.getElementById('jurySemmestre5');
const inputCommS6 = document.getElementById('commSemmestre6');
const inputJuryS6 = document.getElementById('jurySemmestre6');



inputCommS1.addEventListener('change', function(){fichierDepose(inputCommS1);});
inputJuryS1.addEventListener('change', function(){fichierDepose(inputJuryS1);});
inputCommS2.addEventListener('change', function(){fichierDepose(inputCommS2);});
inputJuryS2.addEventListener('change', function(){fichierDepose(inputJuryS2);});
inputCommS3.addEventListener('change', function(){fichierDepose(inputCommS3);});
inputJuryS3.addEventListener('change', function(){fichierDepose(inputJuryS3);});
inputCommS4.addEventListener('change', function(){fichierDepose(inputCommS4);});
inputJuryS4.addEventListener('change', function(){fichierDepose(inputJuryS4);});
inputCommS5.addEventListener('change', function(){fichierDepose(inputCommS5);});
inputJuryS5.addEventListener('change', function(){fichierDepose(inputJuryS5);});
inputCommS6.addEventListener('change', function(){fichierDepose(inputCommS6);});
inputJuryS6.addEventListener('change', function(){fichierDepose(inputJuryS6);});


function fichierDepose(variable) {
	const file = variable.files[0];
	variable.nextElementSibling.textContent = file.name; 

	const formData = new FormData();
	formData.append('fichier', file);

	fetch('../php/lectureFichier.php', {
		method: 'POST',
		body: formData
	})
	.then(response => {
		if (response.ok) {
			console.log('Fichier téléchargé avec succès !');
		} else {
			console.error('Une erreur s\'est produite lors du téléchargement du fichier.');
		}
	})
	.catch(error => {
		console.error('Une erreur s\'est produite :', error);
	});
}