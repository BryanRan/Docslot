document.addEventListener("DOMContentLoaded", () => {
    const animated = document.querySelectorAll(".animate-fadeUp, .animate-fadeLeft, .animate-fadeRight, .animate-scale");
    animated.forEach((el, i) => {
        setTimeout(() => {
            el.classList.remove("opacity-0");
        }, i * 100); // effet de cascade
    });
});