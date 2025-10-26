<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div id="dashboard"
    class="w-full my-2 px-5 bg-light-green/5 rounded-lg flex flex-col opacity-0 translate-y-5 transition-all duration-500 ease-out">

    <!-- Flash messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="mb-4 p-4 flex items-center gap-2 rounded-lg bg-green-50 border border-green-200 text-green-800 shadow-sm">
            <i class="mdi mdi-check-circle text-green-500 text-xl"></i>
            <span class="font-medium"><?= esc(session()->getFlashdata('success')) ?></span>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="mb-4 p-4 flex items-center gap-2 rounded-lg bg-red-50 border border-red-200 text-red-700 shadow-sm">
            <i class="mdi mdi-alert-circle text-red-500 text-xl"></i>
            <span class="font-medium"><?= esc(session()->getFlashdata('error')) ?></span>
        </div>
    <?php endif; ?>

    <!-- Header -->
    <div class="flex items-start justify-between mt-3 opacity-0 transform translate-y-5 transition-all duration-500 delay-100">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Créneaux</h1>
            <p class="text-gray-500">Consultez les créneaux disponibles dans notre cabinet.</p>
        </div>

        <a href="<?=base_url('patient/consult')?>" class="py-1 mt-2 font-medium px-3 rounded-md bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 hover:text-gray-800 shadow-sm transition">
            <i class="mdi mdi-refresh mr-1"></i>Actualiser
        </a>
    </div>

    <!-- Vérification des créneaux -->
    <?php if (!empty($creneaux)): ?>
        <!-- Cards -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            <?php foreach ($creneaux as $c): ?>
                <div class="rounded-xl mb-5 shadow-sm py-2 px-4 border-dark-green/10 bg-white overflow-hidden">
                    <div class="flex items-center">
                        <div class="w-12 h-12 justify-center flex items-center rounded-full border-2 border-dark-green/10">
                            <p class="text-xl text-dark-green font-bold"><?= $c['medecin_nom'][0] ?><?= $c['medecin_prenom'][0] ?></p>
                        </div>
                        <div class="mx-5">
                            <p class="text-gray-700 flex items-center mb-1"><?= $c['date'] ?></p>
                            <p class="text-gray-700 font-medium text-xl flex items-center mb-1"><?= $c['medecin_nom'] ?> <?= $c['medecin_prenom'] ?></p>
                            <p class="text-gray-700 flex items-center mb-1">de <?= $c['heure_debut'] ?> à <?= $c['heure_fin'] ?></p>
                        </div>
                    </div>
                    <div class="border-t-2 border-dark-green/10 py-2 mt-2">
                        <div class="flex items-center justify-between">
                            <p class="font-medium text-lg text-gray-700">Spécialité</p>
                            <p class="text-gray-700"><?= $c['medecin_spec'] ?></p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="font-medium text-lg text-gray-700">Disponibilité</p>
                            <p class="text-gray-700"><?= $c['statut'] ?></p>
                        </div>
                    </div>
                    <?php if ($c['statut'] === 'disponible'): ?>
                        <button
                            class="reserve-btn mt-4 w-full bg-gradient-to-r from-dark-green to-light-green text-white px-4 py-2 rounded-lg transition-colors font-medium shadow-sm"
                            data-id="<?= $c['id'] ?>">
                            Réserver
                        </button>
                    <?php else: ?>
                        <button disabled class="mt-4 w-full bg-gray-400 text-white px-4 py-2 rounded-lg font-medium shadow-sm">
                            Indisponible
                        </button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Modal -->
        <div id="reservationModal"
            class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                <h2 class="text-lg font-bold mb-4">Confirmer la réservation</h2>

                <form id="reservationForm" method="POST">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Sujet du rendez-vous</label>
                    <input type="text" name="sujet" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 mb-4 focus:ring-2 focus:ring-green-500 focus:outline-none">

                    <div class="flex justify-end gap-2">
                        <button type="button" id="closeModal"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                            Annuler
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 shadow-sm">
                            Confirmer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    <?php else: ?>
        <!-- Message si aucun créneau -->
        <p class="text-gray-600 text-center text-xl my-5">Aucun créneau disponible pour le moment</p>
    <?php endif; ?>
</div>

<!-- Script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modal = document.getElementById("reservationModal");
        const form = document.getElementById("reservationForm");
        const closeModalBtn = document.getElementById("closeModal");
        const reserveButtons = document.querySelectorAll(".reserve-btn");

        // Ouvrir le modal
        reserveButtons.forEach(btn => {
            btn.addEventListener("click", () => {
                const id = btn.getAttribute("data-id");
                form.setAttribute("action", "<?= base_url('patient/reserver/') ?>" + id);
                modal.classList.remove("hidden");
            });
        });

        // Fermer le modal
        closeModalBtn.addEventListener("click", () => {
            modal.classList.add("hidden");
        });

        modal.addEventListener("click", (e) => {
            if (e.target === modal) {
                modal.classList.add("hidden");
            }
        });
    });
</script>

<?= $this->endSection() ?>