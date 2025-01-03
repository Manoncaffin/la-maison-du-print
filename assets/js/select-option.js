document.addEventListener('DOMContentLoaded', () => {
    const selectedPartner = document.getElementById('selected-partner');
    const partnersList = document.getElementById('partners-list');
    const partnerLinks = partnersList.querySelectorAll('a');

    selectedPartner.addEventListener('click', () => {
        partnersList.style.display = partnersList.style.display === 'block' ? 'none' : 'block';
    });

    partnerLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();

            const partnerName = link.dataset.partner;
            const partnerUrl = link.getAttribute('href');

            selectedPartner.innerHTML = `<a href="${partnerUrl}" target="_blank">${partnerName}</a>`;

            partnersList.style.display = 'none';
        });
    });
});
