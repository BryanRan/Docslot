// alert.js
window.addEventListener('DOMContentLoaded', () => {
    const alert = document.getElementById('alert');
    if (alert) {
        // déclenche l'animation d'apparition
        setTimeout(() => {
            alert.classList.remove('opacity-0', '-translate-y-6');
            alert.classList.add('opacity-100', 'translate-y-0');
        }, 50);

        // optionnel : disparition automatique après 5s
        setTimeout(() => {
            alert.classList.add('opacity-0', '-translate-y-6');
            alert.classList.remove('opacity-100', 'translate-y-0');
        }, 3500); // 5s + 0.5s pour la transition
    }
});
