document.addEventListener("DOMContentLoaded", function() {
    if(sessionStorage.getItem('estCo') !== null) {
        const labels = document.querySelectorAll('.lbldg');
        const inputs = document.querySelectorAll('.idg');
        const btnSubmit = document.getElementById('btnSubmit');
        const btnPromo = document.getElementById('btnPromo');
        let files = [];
        let nomInputs = [];


        inputs.forEach(input => {
            input.addEventListener('change', function() {
                event.preventDefault();
                const file = input.files[0];
                nomInputs.push(input.nextElementSibling.innerHTML);
                input.nextElementSibling.innerHTML = file.name;
                files.push(file);
            });
        });

        labels.forEach(label => {
            label.addEventListener('drag', function() {
                event.preventDefault();
            });
            
            label.addEventListener('dragover', function() {
                event.preventDefault();
            });
            
            label.addEventListener('drop', function() {
                event.preventDefault();
                const file = event.dataTransfer.files[0];
                nomInputs.push(label.innerHTML);
                label.innerHTML = file.name;
                files.push(file);
            });
        });

        btnSubmit.addEventListener('click', function() {
            event.preventDefault(); // a retirer pour le déploiement
            uploadFile();
        });

        function uploadFile() {
            const promo = parseInt(btnPromo.value);
            if(!Number.isInteger(promo)){
                return alert('Veuillez sélectionner une promotion.');
            }

            let i = 0;
            for (const file of files) {
                console.log(file);
                const formData = new FormData();
                formData.append('file', file);
                formData.append('source', nomInputs[i++]);
                formData.append('promo', promo);

                fetch("http://localhost:8000/upload.php", {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    console.log(response);
                    if (response.ok) {
                        return response.text();
                    }
                    throw new Error('Network response was not ok.');
                })
                .then(data => {
                    sessionStorage.setItem('data', data);
                    alert(data);
                    console.log('File uploaded successfully:', data);
                })
                .catch(error => {
                    console.error('There was a problem with the file upload:', error);
                });
            }
        }
    }
});