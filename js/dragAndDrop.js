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
    let i = 0;
    for (const file of files) {
        console.log(file);
        const formData = new FormData();
        formData.append('file', file);
        formData.append('source', nomInputs[i]);
        formData.append('promo', btnPromo.innerHTML);

        fetch("http://192.168.1.17:8000/upload.php", {
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