document.getElementById('dropdownBtn').addEventListener('click', function() {
    const dropdownList = document.getElementById('dropdownList');
    dropdownList.classList.toggle('hidden');
});

const dropdownButtons = document.querySelectorAll('#dropdownList button');

dropdownButtons.forEach(button => {
    button.addEventListener('click', function() {
        if(button.id !== 'creerPromo') {
            document.getElementById('dropdownText').textContent = button.innerHTML;
        }
        dropdownList.classList.add('hidden');
    });
});

document.addEventListener('click', function(event) {
    const targetElement = event.target;

    if (targetElement.id !== 'dropdownText' && targetElement.id !== 'dropdownBtn' && targetElement.id !== 'dropdownImg') {
        dropdownList.classList.add('hidden'); 
    }
});
    
fetch("http://192.168.1.17:8000/annee.php").then(response => { 
    if(response.ok)
        return response.text();
    throw new Error('Network response was not ok.');
}).then(data => {
    data.forEach(annee => {
        let option = document.createElement('a');   
        option.classList.add('flex', 'items-center', 'h-8', 'px-3', 'text-sm', 'bg-vertFonce', 'text-white', 'font-bold', 'hover:bg-vertClair', 'hover:text-black', 'rounded');
        option.textContent = annee;
        document.getElementById('dropdownList').appendChild(option);
    });
});