// document.addEventListener("DOMContentLoaded", function () {
//     const buttons = document.querySelectorAll(".tag-desktop");
//     const galleryItems = document.querySelectorAll(".gallery-item");

//     console.log("Boutons trouvés :", buttons.length);
//     console.log("Éléments trouvés :", galleryItems.length);

//     buttons.forEach(button => {
//         button.addEventListener("click", function () {
//             console.log("Bouton cliqué :", button.getAttribute("data-category"));

//             buttons.forEach(btn => btn.classList.remove("active"));
//             button.classList.add("active");

//             const selectedCategory = button.getAttribute("data-category");

//             galleryItems.forEach(item => {
//                 const itemCategories = item.getAttribute("data-category").split(" ");
//                 console.log("Catégories de l'élément :", itemCategories);

//                 if (selectedCategory === "all" || itemCategories.includes(selectedCategory)) {
//                     item.style.display = "block";
//                 } else {
//                     item.style.display = "none";
//                 }
//             });
//         });
//     });
// });
document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".tag-desktop");
    const gallery = document.querySelector(".gallery");
    const galleryItems = Array.from(document.querySelectorAll(".gallery-item"));

    buttons.forEach(button => {
        button.addEventListener("click", function () {
            buttons.forEach(btn => btn.classList.remove("active"));
            button.classList.add("active");

            const selectedCategory = button.getAttribute("data-category");

            galleryItems.forEach(item => {
                const itemCategories = item.getAttribute("data-category").split(" ");
                if (selectedCategory === "all" || itemCategories.includes(selectedCategory)) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });

            // Forcer le recalcul de la grille après filtrage
            setTimeout(() => {
                galleryItems.forEach(item => {
                    if (item.style.display === "block") {
                        gallery.appendChild(item);
                    }
                });
            }, 10);
        });
    });
});

