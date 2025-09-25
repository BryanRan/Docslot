<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div id="dashboard" class="w-full my-2 px-5 bg-light-green/5 rounded-lg flex flex-col opacity-0 translate-y-5 transition-all duration-500 ease-out">


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

        <button class="py-1 mt-2 font-medium px-3 rounded-md bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 hover:text-gray-800 shadow-sm transition">
            <i class="mdi mdi-refresh mr-1"></i>Actualiser
        </button>
    </div>

    <!-- Cards -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        <?php foreach ($creneaux as $c): ?>
            <div class="rounded-xl shadow-sm hover:shadow-lg transition transform hover:scale-105 bg-white overflow-hidden">
                
                <!-- Header coloré -->
                <div class="bg-gray-200 text-gray-800 px-4 py-2 font-semibold text-center">
                     <i class="mdi mdi-calendar mr-1"></i> <?= esc($c['date']) ?>
                </div>


                <!-- Contenu centré -->
                <div class="p-6 flex flex-col justify-center items-center text-center">
                    <p class="text-gray-700 flex items-center mb-1">
                        <i class="mdi mdi-clock-outline text-gray-500 mr-2"></i>
                        <?= esc($c['heure_debut']) ?> - <?= esc($c['heure_fin']) ?>
                    </p>
                    <p class="text-sm text-gray-600 mb-1">
                        Statut :
                        <span class="font-semibold <?= $c['statut'] === 'disponible' ? 'text-green-600' : 'text-red-600' ?>">
                            <?= esc($c['statut']) ?>
                        </span>
                    </p>
                    <p class="text-sm text-gray-600 mb-1 flex items-center justify-center">
                        <i class="mdi mdi-doctor text-gray-500 mr-2"></i>
                        <span class="font-semibold text-blue-600">
                            Dr. <?= esc($c['medecin_nom']) ?> <?= esc($c['medecin_prenom']) ?>
                        </span>
                    </p>
                    <p class="text-sm text-gray-600 flex items-center justify-center">
                        <i class="mdi mdi-stethoscope text-gray-500 mr-2"></i>
                        <span class="font-semibold text-blue-600">
                            <?= esc($c['medecin_spec']) ?>
                        </span>
                    </p>

                    <!-- Bouton -->
                    <?php if ($c['statut'] === 'disponible'): ?>
                        <form action="<?= base_url('patient/reserver/' . $c['id']) ?>" method="POST" class="w-full">
                            <button type="submit" class="mt-4 w-full bg-dark-green text-white px-4 py-2 rounded-lg hover:bg-green-700 transition font-medium shadow-sm">
                                Réserver
                            </button>
                        </form>
                    <?php else: ?>
                        <button disabled class="mt-4 w-full bg-gray-400 text-white px-4 py-2 rounded-lg font-medium shadow-sm">
                            Indisponible
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>
