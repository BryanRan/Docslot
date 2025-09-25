
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?php
// === Données mock simplifiées ===
$rendezvous = [
    [
        'date' => date('Y-m-d', strtotime('+2 days')),
        'heure_debut' => '10:30',
        'heure_fin' => '11:30',
        'medecin_nom' => 'Rakoto',
        'medecin_prenom' => 'Jean',
        'specialite' => 'Dermatologue',
        'sujet' => 'Acné',
        'statut' => 'validé'
    ],
    [
        'date' => date('Y-m-d', strtotime('+2 days')),
        'heure_debut' => '14:00',
        'heure_fin' => '14:30',
        'medecin_nom' => 'Rasoa',
        'medecin_prenom' => 'Faly',
        'specialite' => 'Pédiatre',
        'sujet' => 'Vaccin',
        'statut' => 'en attente'
    ],
    [
        'date' => date('Y-m-d', strtotime('-2 days')),
        'heure_debut' => '09:00',
        'heure_fin' => '09:30',
        'medecin_nom' => 'Andrian',
        'medecin_prenom' => 'Lala',
        'specialite' => 'Cardiologue',
        'sujet' => 'Suivi tension',
        'statut' => 'refusé'
    ],
    [
        'date' => date('Y-m-d', strtotime('-5 days')),
        'heure_debut' => '15:00',
        'heure_fin' => '15:30',
        'medecin_nom' => 'Rasoanaivo',
        'medecin_prenom' => 'Miora',
        'specialite' => 'Ophtalmologue',
        'sujet' => 'Contrôle vue',
        'statut' => 'annulé'
    ],
];
?>

<div id="dashboard" class="w-full min-h-screen my-2 px-5 py-6 bg-light-green/5 flex flex-col">

    <!-- Header -->
    <div class="flex items-start justify-between">
        <div>
            <h1 class="text-2xl font-bold">Mes rendez-vous</h1>
            <p class="text-gray-600">Voici la liste de toutes vos demandes de rendez-vous, avec leur statut actuel.</p>
        </div>

        <a href="<?= base_url('patient/appointment') ?>" class="py-1 mt-2 font-medium hover:text-gray-600 transition-colors duration-100 hover:border hover:border-gray-200 px-3 rounded-md bg-white">
            <i class="mdi mdi-refresh mr-1"></i>Actualiser
        </a>
    </div>

    <!-- Onglets -->
    <div class="border-b border-gray-200 my-6">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="rendezvousTabs" role="tablist">
            <li role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg text-green-600 border-green-600" 
                        data-target="#venir" type="button" role="tab" aria-selected="true">
                    Rendez-vous à venir
                </button>
            </li>
            <li role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg text-gray-500 border-transparent hover:text-gray-600 hover:border-gray-300" 
                        data-target="#passes" type="button" role="tab" aria-selected="false">
                    Rendez-vous passés
                </button>
            </li>
        </ul>
    </div>

    <!-- Contenu onglets -->
    <div class="space-y-4  flex-1">

        <!-- Rendez-vous à venir -->
        <div id="venir" class="space-y-4">
            <?php foreach ($rendezvous as $rdv): ?>
                <?php if (new DateTime($rdv['date']) >= new DateTime()): ?>
                    <div class="p-8 border rounded-lg shadow hover:shadow-md transition flex flex-col bg-white">
                        <div class="flex justify-between items-center">
                            <!-- Colonne gauche : Date + Heure -->
                            <div class="flex flex-col border-l border-solid border-gray-500 pl-2">
                                <p class="text-light-green font-semibold">
                                    <i class="mdi mdi-calendar mr-1"></i>
                                    <?= esc($rdv['date']) ?>
                                </p>
                                <p class="text-gray-700 font-semibold">
                                    <i class="mdi mdi-clock-outline mr-1"></i>
                                    <?= esc($rdv['heure_debut']) ?> - <?= esc($rdv['heure_fin']) ?>
                                </p>
                            </div>

                            <!-- Colonne centre : Médecin + Sujet -->
                            <div class="flex flex-col text-left gap-2">
                                <div class="flex">
                                    <span class="w-24 font-semibold text-light-green">Médecin :</span>
                                    <span class="text-gray-600 font-semibold">
                                        Dr. <?= esc($rdv['medecin_nom']) ?> <?= esc($rdv['medecin_prenom']) ?> (<?= esc($rdv['specialite']) ?>)
                                    </span>
                                </div>
                                <div class="flex">
                                    <span class="w-24 font-semibold text-light-green">Sujet :</span>
                                    <span class="text-gray-600 font-semibold"><?= esc($rdv['sujet']) ?></span>
                                </div>
                            </div>


                            <!-- Colonne droite : Statut + bouton Annuler -->
                            <div class="flex  items-end gap-6">
                                <?php 
                                    $status = $rdv['statut'];
                                    $statusClass = match($status) {
                                        'validé' => 'bg-green-100 text-green-800',
                                        'refusé' => 'bg-red-100 text-red-800',
                                        'annulé' => 'bg-gray-200 text-gray-700',
                                        default => 'bg-yellow-100 text-yellow-800',
                                    };
                                ?>
                                <p class="text-sm text-gray-700 w-28 text-center">
                                    <span class="font-semibold px-3 py-1 rounded-full <?= $statusClass ?> inline-block w-full">
                                        <?= esc(ucfirst($status)) ?>
                                    </span>
                                </p>

                                <?php if ($status !== 'annulé' && $status !== 'refusé'): ?>
                                    <button class="mt-3 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition w-28 cancel-btn">
                                        Annuler
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <!-- Rendez-vous passés -->
        <div id="passes" class="w-full  hidden">
            <div class="w-full overflow-x-auto">
                <table class="w-full min-w-full  bg-white border-b rounded-lg shadow">
                    <thead class=" border-b  ">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Date</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Médecin</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Spécialité</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Sujet</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rendezvous as $rdv): ?>
                            <?php if (new DateTime($rdv['date']) < new DateTime()): ?>
                                <?php 
                                    $status = $rdv['statut'];
                                    $statusClass = match($status) {
                                        'validé' => 'bg-green-100 text-green-800',
                                        'refusé' => 'bg-red-100 text-red-800',
                                        'annulé' => 'bg-gray-200 text-gray-700',
                                        default => 'bg-yellow-100 text-yellow-800',
                                    };
                                ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 text-gray-700 font-medium">
                                        <i class="mdi mdi-calendar mr-1"></i><?= esc($rdv['date']) ?>
                                    </td>
                                    <td class="px-6 py-4 text-blue-600 font-semibold">
                                        Dr. <?= esc($rdv['medecin_nom']) ?> <?= esc($rdv['medecin_prenom']) ?>
                                    </td>
                                    <td class="px-6 py-4 text-gray-700 font-semibold">
                                        <?= esc($rdv['specialite']) ?>
                                    </td>
                                    <td class="px-6 py-4 text-gray-700 font-semibold">
                                        <?= esc($rdv['sujet']) ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 rounded-full font-semibold <?= $statusClass ?> inline-block">
                                            <?= esc(ucfirst($status)) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

<!-- Modal Annulation -->
<div id="cancelModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden transition-opacity duration-300">
    <div class="bg-white rounded-lg shadow-lg w-96 p-6 transform transition-transform duration-300 scale-90">
        <h2 class="text-lg font-bold mb-4">Annuler le rendez-vous</h2>
        <p class="mb-6">Voulez-vous vraiment annuler ce rendez-vous ?</p>
        <div class="flex justify-end gap-3">
            <button id="cancelClose" class="px-4 py-2 rounded-md bg-gray-200 hover:bg-gray-300">Annuler</button>
            <button id="cancelConfirm" class="px-4 py-2 rounded-md bg-red-600 text-white hover:bg-red-700">Confirmer</button>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('#rendezvousTabs button');
    const venir = document.getElementById('venir');
    const passes = document.getElementById('passes');
    const modal = document.getElementById('cancelModal');
    let currentButton = null;

    // Gestion des onglets
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => {
                t.classList.remove('text-green-600', 'border-green-600');
                t.classList.add('text-gray-500', 'border-transparent');
            });
            this.classList.remove('text-gray-500', 'border-transparent');
            this.classList.add('text-green-600', 'border-green-600');

            if(this.dataset.target === '#venir'){
                venir.classList.remove('hidden');
                passes.classList.add('hidden');
            } else {
                venir.classList.add('hidden');
                passes.classList.remove('hidden');
            }
        });
    });

    // Boutons Annuler
    venir.addEventListener('click', function(e) {
        if(e.target && e.target.classList.contains('cancel-btn')){
            currentButton = e.target;
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.querySelector('div').classList.remove('scale-90');
            }, 10);
        }
    });

    // Fermer modal
    document.getElementById('cancelClose').addEventListener('click', () => {
        modal.querySelector('div').classList.add('scale-90');
        setTimeout(() => modal.classList.add('hidden'), 200);
        currentButton = null;
    });

    // Confirmer annulation
    document.getElementById('cancelConfirm').addEventListener('click', () => {
        if(currentButton){
            const statusSpan = currentButton.previousElementSibling.querySelector('span');
            statusSpan.textContent = 'Annulé';
            statusSpan.className = 'font-semibold px-3 py-1 rounded-full bg-gray-200 text-gray-700 inline-block w-full';
            currentButton.remove();
        }
        modal.querySelector('div').classList.add('scale-90');
        setTimeout(() => modal.classList.add('hidden'), 200);
        currentButton = null;
    });
});
</script>
<?= $this->endSection() ?>
