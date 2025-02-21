document.addEventListener('DOMContentLoaded', () => {
    const tags = document.querySelectorAll('.tag-desktop'); // Cibler tous les boutons
    const galleryItems = document.querySelectorAll('.gallery-item'); // Cibler toutes les images

    tags.forEach(tag => {
        tag.addEventListener('click', () => {
            const category = tag.getAttribute('data-category');
            
            // Gérer l'activation de la catégorie
            tags.forEach(t => t.classList.remove('active'));  // Enlever 'active' des autres boutons
            tag.classList.add('active');  // Ajouter 'active' au bouton actuel

            // Afficher/masquer les éléments en fonction de la catégorie
            galleryItems.forEach(item => {
                // Si "all" est sélectionné, on montre tous les items
                if (category === 'all') {
                    item.classList.remove('hidden');
                } else {
                    // Sinon, on vérifie si l'élément correspond à la catégorie
                    if (item.classList.contains(category)) {
                        item.classList.remove('hidden');  // Afficher l'élément
                    } else {
                        item.classList.add('hidden');  // Masquer l'élément
                    }
                }
            });
        });
    });
});
