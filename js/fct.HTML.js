document.querySelectorAll('a[href^="#"]').forEach(anchor => {
	anchor.addEventListener('click', function (e) {
	e.preventDefault();

	const target = document.querySelector(this.getAttribute('href'));
		if (target) {
			const topOffset = target.offsetTop;
			const navbarHeight = document.querySelector('nav').offsetHeight;
			window.scrollTo({
				top: topOffset - navbarHeight,
				behavior: 'smooth'
			});
		}
	});
});

document.getElementById("creerAnnee").addEventListener("click", function() {
    var selectedValue = this.value;

    console.log("Option sélectionnée :", selectedValue);
});