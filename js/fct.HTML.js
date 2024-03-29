document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        
        const target = document.querySelector(this.getAttribute('href'));
        
        if (target) {
            const topOffset = target.offsetTop;
            let navbarHeight = 0;

            if (target.id !== "Accueil") {
                navbarHeight = document.querySelector('nav').offsetHeight;
            }

            window.scrollTo({
                top: topOffset - navbarHeight,
                behavior: 'smooth'
            });
        }
    });
});
