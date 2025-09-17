document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll("aside button");

    buttons.forEach(btn => {
        btn.addEventListener("click", () => {
            // Enlever l'état actif de tous les boutons
            buttons.forEach(b => {
                b.classList.remove(
                    "bg-gradient-to-r",
                    "from-dark-green",
                    "to-light-green",
                    "text-white"
                );
                b.classList.add("text-neutral-500");
            });

            // Ajouter l'état actif au bouton cliqué
            btn.classList.remove("text-neutral-500");
            btn.classList.add(
                "bg-gradient-to-r",
                "from-dark-green",
                "to-light-green",
                "text-white"
            );
            console.log("bonjour le monde");
        });
    });
});
