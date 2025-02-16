document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM chargé !");
    
    const dropdownToggle = document.querySelector(".dropdown-toggle");
    const dropdownMenu = document.querySelector(".dropdown-menu");
    const buttons = document.querySelectorAll(".filter-btn");
    const allProjects = document.querySelectorAll(".gallery-item");

    console.log("Éléments trouvés :", allProjects.length); // Vérification

    // Afficher tous les projets au chargement
    allProjects.forEach(project => {
        project.style.display = "block";
    });

    // Ouvrir/Fermer le menu au clic sur "Type d'impression"
    dropdownToggle.addEventListener("click", function () {
        dropdownMenu.classList.toggle("active");
    });

    // Appliquer le filtre
    buttons.forEach(button => {
        button.addEventListener("click", function () {
            const category = this.getAttribute("data-category");

            allProjects.forEach(project => {
                if (category === "all") {
                    project.style.display = "block"; // Afficher tous les projets
                } else {
                    // Cacher ou afficher en fonction de la catégorie
                    if (project.classList.contains(category)) {
                        project.style.display = "block";
                    } else {
                        project.style.display = "none";
                    }
                }
            });

            // Fermer le menu après sélection
            dropdownMenu.classList.remove("active");
        });
    });

    // Fermer le menu si on clique ailleurs
    document.addEventListener("click", function (event) {
        if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.remove("active");
        }
    });
});
