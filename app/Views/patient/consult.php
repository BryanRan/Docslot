<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div id="dashboard" class="w-full my-2 px-5 bg-light-green/5 rounded-lg flex flex-col opacity-0 translate-y-5 transition-all duration-500 ease-out">

    <!-- Flash messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="mb-4 p-4 flex items-center gap-2 rounded-lg bg-green-100 border border-green-300 text-green-800 shadow">
            <i class="mdi mdi-check-circle text-green-600 text-xl"></i>
            <span><?= esc(session()->getFlashdata('success')) ?></span>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="mb-4 p-4 flex items-center gap-2 rounded-lg bg-red-100 border border-red-300 text-red-800 shadow">
            <i class="mdi mdi-alert-circle text-red-600 text-xl"></i>
            <span><?= esc(session()->getFlashdata('error')) ?></span>
        </div>
    <?php endif; ?>

    <!-- Start -->
    <div class="flex items-start mt-3 justify-between opacity-0 transform translate-y-5 transition-all duration-500 delay-100">
        <div>
            <h1 class="text-2xl font-bold">Créneaux</h1>
            <p class="text-gray-600">Vérifiez et visionnez les différents créneaux disponibles dans notre cabinet.</p>
        </div>

        <button class="py-1 mt-2 font-medium hover:text-gray-600 transition-colors duration-100 hover:border hover:border-gray-200 px-3 rounded-md bg-white">
            <i class="mdi mdi-refresh mr-1"></i>Actualiser
        </button>
    </div>

    <div class="grid md:grid-cols-2 gap-4 mt-4">
        <?php foreach ($creneaux as $c): ?>
            <div class="p-4 border rounded-lg shadow hover:shadow-md transition">
                <p class="text-gray-700"><i class="mdi mdi-calendar text-gray-500 mr-1"></i> <?= esc($c['date']) ?></p>
                <p class="text-gray-700"><i class="mdi mdi-clock-outline text-gray-500 mr-1"></i> <?= esc($c['heure_debut']) ?> - <?= esc($c['heure_fin']) ?></p>
                <p class="text-sm text-gray-500">
                    Statut :
                    <span class="font-semibold <?= $c['statut'] === 'disponible' ? 'text-green-600' : 'text-red-600' ?>">
                        <?= esc($c['statut']) ?>
                    </span>
                </p>
                <p class="text-sm text-gray-500">
                    <i class="mdi mdi-doctor text-gray-500 mr-1"></i>
                    <span class="font-semibold text-blue-600">
                        Dr. <?= esc($c['medecin_nom']) ?> <?= esc($c['medecin_prenom']) ?>
                    </span>
                </p>
                <p class="text-sm text-gray-500">
                    <i class="mdi mdi-stethoscope text-gray-500 mr-1"></i>
                    <span class="font-semibold text-blue-600">
                        <?= esc($c['medecin_spec']) ?>
                    </span>
                </p>

                <!-- Bouton Réserver activé uniquement si disponible -->
                <?php if ($c['statut'] === 'disponible'): ?>
                    <form action="<?= base_url('patient/reserver/' . $c['id']) ?>" method="POST">
                        <button type="submit" class="mt-3 w-full bg-dark-green text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                            Réserver
                        </button>
                    </form>
                <?php else: ?>
                    <button disabled class="mt-3 w-full bg-gray-400 text-white px-4 py-2 rounded-lg">
                        Indisponible
                    </button>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>