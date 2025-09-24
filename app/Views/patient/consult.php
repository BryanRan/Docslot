<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div id="dashboard" class="w-full my-2 px-5 bg-light-green/5 rounded-lg flex flex-col opacity-0 translate-y-5 transition-all duration-500 ease-out">
    <!-- Start -->
    <div class="flex items-start mt-3 justify-between opacity-0 transform translate-y-5 transition-all duration-500 delay-100">
        <div>
            <h1 class="text-2xl font-bold">Créneaux</h1>
            <p class="text-gray-600">Vérifiez et visionner les différents créneaux disponibles dans notre cabinet.</p>
        </div>

        <button class="py-1 mt-2 font-medium hover:text-gray-600 transition-colors duration-100 hover:border hover:border-gray-200 px-3 rounded-md bg-white">
            <i class="mdi mdi-refresh mr-1"></i>Actualiser
        </button>
    </div>

    <div class="max-w-4xl mx-auto p-6">

        <?php if (session()->getFlashdata('error')): ?>
            <div class="p-3 mb-4 text-red-700 bg-red-100 rounded">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (empty($creneaux)): ?>
            <p class="text-gray-600">Aucun créneau disponible pour le moment.</p>
        <?php else: ?>
            <div class="grid md:grid-cols-2 gap-4">
                <?php foreach ($creneaux as $c): ?>
                    <div class="p-4 border rounded-lg shadow hover:shadow-md transition">
                        <p class="text-gray-700">📅 <?= esc($c['date']) ?></p>
                        <p class="text-gray-700">🕒 <?= esc($c['heure_debut']) ?> - <?= esc($c['heure_fin']) ?></p>
                        <p class="text-sm text-gray-500">
                            Statut :
                            <span class="font-semibold text-green-600"><?= esc($c['statut']) ?></span>
                        </p>

                        <button class="mt-3 w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                            Réserver
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</div>

<?= $this->endSection() ?>