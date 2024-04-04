var btnExport = document.getElementById('exportExelPromo');

btnExport.addEventListener('click', function() {
	fetchDataFromDatabase();
});




function fetchDataFromDatabase() {
    fetch('fetchData.php')
        .then(response => response.json())
        .then(data => {
            createExcelDocument(data);
        })
        .catch(error => console.error('Erreur lors de la récupération des données:', error));
}

function createExcelDocument(data) {
	const worksheet = XLSX.utils.json_to_sheet(data);
	const workbook = XLSX.utils.book_new();
	XLSX.utils.book_append_sheet(workbook, worksheet, 'Promo Data');
	XLSX.writeFile(workbook, 'promoData.xlsx');
}
