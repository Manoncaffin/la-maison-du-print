document.addEventListener("DOMContentLoaded", function () {
    gsap.from("main", { 
        y: -100,  
        opacity: 0, 
        duration: 0.8, 
        ease: "power2.out"
    });

    document.querySelectorAll("a").forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault(); 
            let target = this.href;
            gsap.to("main", { 
                y: 100, 
                opacity: 0, 
                duration: 0.5, 
                ease: "power2.in",
                onComplete: () => window.location.href = target 
            });
        });
    });
});
