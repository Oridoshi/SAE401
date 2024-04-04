const labels = document.querySelectorAll('.lbldg');
const inputs = document.querySelectorAll('.idg');
const btnSubmit = document.getElementById('btnSubmit');
let files = [];


inputs.forEach(input => {
    input.addEventListener('change', function() {
        event.preventDefault();
        const file = input.files[0];
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
        label.innerHTML = file.name;
        files.push(file);
    });
});

btnSubmit.addEventListener('click', function() {
    event.preventDefault();
    uploadFile();
});

function uploadFile() {
    for (const file of files) {
        const formData = new FormData();
        formData.append('file', file);

        fetch("http://localhost:8000/upload.php", {
            method: 'POST',
            body: formData
        })
        .then(response => {
            alert(response);
            if (response.ok) {
                return response.text();
            }
            throw new Error('Network response was not ok.');
        })
        .then(data => {
            console.log('File uploaded successfully:', data);
            // Mettre à jour le contenu de l'étiquette avec le nom du fichier
            label.innerHTML = file.name;
        })
        .catch(error => {
            console.error('There was a problem with the file upload:', error);
        });
    }
}