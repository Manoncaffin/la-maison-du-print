document.addEventListener("DOMContentLoaded", function () {
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        const span = dropdown.querySelector("span");

        span.addEventListener("click", function (event) {
            event.stopPropagation(); 

            dropdowns.forEach(d => {
                if (d !== dropdown) d.classList.remove("active");
            });

            dropdown.classList.toggle("active");
        });
    });

    document.addEventListener("click", function () {
        dropdowns.forEach(dropdown => dropdown.classList.remove("active"));
    });
});
