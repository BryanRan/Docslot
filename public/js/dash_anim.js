window.addEventListener('DOMContentLoaded', () => {
    const dashboard = document.getElementById('dashboard');
    dashboard.classList.remove('opacity-0', 'translate-y-5');

    const items = dashboard.querySelectorAll('.shadow-sm, .rounded-md, .flex.items-start');
    items.forEach((el, index) => {
        setTimeout(() => {
            el.classList.remove('opacity-0', 'translate-y-5', 'translate-y-2');
        }, 1.5 * index);
    });
});