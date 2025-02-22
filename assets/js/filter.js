document.addEventListener('DOMContentLoaded', () => {
    const tags = document.querySelectorAll('.tag-desktop');
    const galleryItems = document.querySelectorAll('.gallery-item');

    tags.forEach(tag => {
        tag.addEventListener('click', () => {
            const category = tag.getAttribute('data-category');

            tags.forEach(t => t.classList.remove('active'));
            tag.classList.add('active');

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
