<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div id="dashboard" class="w-full my-2 px-5 bg-light-green/5 rounded-lg flex flex-col opacity-0 translate-y-5 transition-all duration-500 ease-out">

    <!-- Header -->
    <div class="flex items-start mt-3 justify-between opacity-0 transform translate-y-5 transition-all duration-500 delay-100">
        <div>
            <h1 class="text-2xl font-bold">Mes rendez-vous</h1>
            <p class="text-gray-600">Voici la liste de toutes vos demandes de rendez-vous, avec leur statut actuel.</p>
        </div>

        <a href="<?= base_url('patient/appointment') ?>"
            class="py-1 mt-2 font-medium hover:text-gray-600 transition-colors duration-100 hover:border hover:border-gray-200 px-3 rounded-md bg-white">
            <i class="mdi mdi-refresh mr-1"></i>Actualiser
        </a>
    </div>

    <!-- Liste des rendez-vous -->
    <div class="grid md:grid-cols-2 gap-4 mt-4">
        <?php if (!empty($rendezvous)): ?>
            <?php foreach ($rendezvous as $rdv): ?>
                <div class="p-4 border rounded-lg shadow hover:shadow-md transition">
                    <p class="text-gray-700">
                        <i class="mdi mdi-calendar mr-1"></i>
                        <?= esc($rdv['date']) ?>
                    </p>
                    <p class="text-gray-700">
                        <i class="mdi mdi-clock-outline mr-1"></i>
                        <?= esc($rdv['heure_debut']) ?> - <?= esc($rdv['heure_fin']) ?>
                    </p>
                    <p class="text-sm text-gray-500">
                        Médecin :
                        <span class="font-semibold text-blue-600">
                            Dr. <?= esc($rdv['medecin_nom']) ?> <?= esc($rdv['medecin_prenom']) ?> (<?= esc($rdv['specialite']) ?>)
                        </span>
                    </p>
                    <p class="text-sm text-gray-500">
                        Statut :
                        <span class="font-semibold 
                            <?= $rdv['statut'] === 'validé' ? 'text-green-600'
                                : ($rdv['statut'] === 'refusé' ? 'text-red-600'
                                    : ($rdv['statut'] === 'annulé' ? 'text-gray-500' : 'text-yellow-600')) ?>">
                            <?= esc(ucfirst($rdv['statut'])) ?>
                        </span>
                    </p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-gray-600 mt-4">Vous n’avez encore aucun rendez-vous.</p>
        <?php endif; ?>
    </div>

</div>

<?= $this->endSection() ?>