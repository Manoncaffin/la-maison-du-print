document.addEventListener('DOMContentLoaded', () => {
    const tags = document.querySelectorAll('.tag-desktop');
    const galleryItems = document.querySelectorAll('.gallery-item');

    tags.forEach(tag => {
        tag.addEventListener('click', () => {
            const category = tag.getAttribute('data-category');

            // Flou uniquement sur les boutons
            tags.forEach(t => {
                t.classList.remove('active');
                if (category === 'all') {
                    t.classList.remove('blurred');
                } else {
                    t.classList.add('blurred');
                }
            });
            tag.classList.add('active');
            tag.classList.remove('blurred');

            // Affichage/masquage des images (sans flou)
            galleryItems.forEach(item => {
                if (category === 'all') {
                    item.classList.remove('hidden');
                } else {
                    if (item.classList.contains(category)) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                }
            });
        });
    });
});