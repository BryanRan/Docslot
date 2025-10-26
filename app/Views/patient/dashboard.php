<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div id="dashboard" class="w-full my-2 px-5 bg-light-green/5 rounded-lg flex flex-col opacity-0 translate-y-5 transition-all duration-500 ease-out">
    <!-- Start -->
    <div class="flex items-start mt-3 justify-between opacity-0 transform translate-y-5 transition-all duration-500 delay-100">
        <div>
            <h1 class="text-2xl font-bold">Dashboard</h1>
            <p class="text-gray-600">Bienvenue dans votre espace patient. Ici vous verrez vos informations.</p>
        </div>

        <a href="<?= base_url('patient/dashboard') ?>">
            <button class="py-1 mt-2 font-medium hover:text-gray-600 transition-colors duration-100 hover:border text-b hover:border-gray-200 px-3 rounded-md bg-white">
                <i class="mdi mdi-refresh mr-1"></i>Actualiser
            </button>
        </a>
    </div>

    <!-- Summary -->
    <div class="mt-5 flex w-full justify-between items-stretch space-x-4">
        <?php
        $cards = [
            ['title' => 'Demande(s) effectuée(s)', 'icon' => 'mdi-calendar-blank', 'count' => $totalRdv, 'color' => 'dark-green', 'bg' => 'bg-light-green/20'],
            ['title' => 'Demande(s) en attente', 'icon' => 'mdi-clock-time-three-outline', 'count' => $rdvEnAttente, 'color' => 'blue-200', 'bg' => 'bg-blue-100'],
            ['title' => 'Rendez-vous annulé(s)', 'icon' => 'mdi-close', 'count' => $annulation, 'color' => 'red-500', 'bg' => 'bg-red-100'],
            ['title' => 'Rappel', 'icon' => 'mdi-bell-ring-outline', 'count' => null, 'color' => 'dark-green', 'bg' => 'bg-yellow-100'],
        ];
        foreach ($cards as $i => $card): ?>
            <div class="bg-white shadow-sm hover:scale-105 duration-200 transition-all rounded-md p-5 opacity-0 transform translate-y-5 flex flex-col justify-between min-h-[200px] w-1/4" style="transition-delay: <?= 150 * $i ?>ms">

                <div class="flex flex-col items-center text-center">
                    <h3 class="font-medium text-gray-600"><?= $card['title'] ?></h3>
                    <div class="<?= $card['bg'] ?> mt-3 shadow-md h-16 w-16 flex items-center justify-center rounded-md">
                        <i class="mdi <?= $card['icon'] ?> text-4xl text-<?= $card['color'] ?>"></i>
                    </div>
                </div>

                <?php if ($card['count'] !== null): ?>
                    <div class="mt-3 text-center">
                        <p class="text-sm text-gray-600">Vous avez</p>
                        <p class="text-3xl font-semibold text-<?= $card['color'] ?>"><?= $card['count'] ?></p>
                        <p class="text-sm text-gray-600"><?= strtolower($card['title']) ?></p>
                    </div>
                <?php else: ?>
                    <div class="mt-3 text-center text-sm text-gray-700">
                        <p class="font-medium">Rendez-vous le plus proche</p>
                        <?php if ($prochainRdv): ?>
                            <p class="mt-1 mb-2">
                                avec <span class="font-semibold">Dr. <?= esc($prochainRdv['nom_medecin'] . ' ' . $prochainRdv['prenom_medecin'] ?? 'Inconnu') ?></span><br>
                                <span class="text-gray-500">
                                    <?= date('l, d F Y', strtotime($prochainRdv['date'])) ?>
                                    de <?= date('H:i', strtotime($prochainRdv['heure_debut'])) ?>
                                    à <?= date('H:i', strtotime($prochainRdv['heure_fin'])) ?>
                                </span>
                            </p>

                        <?php else: ?>
                            <p class="text-gray-500 mt-2">Aucun rendez-vous prévu.</p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>



    <!-- Historique et créneaux -->
    <div class="mt-5 flex w-full mb-5 justify-between space-x-4">
        <!-- Créneaux -->
        <div class="bg-white shadow-sm rounded-md flex flex-col opacity-0 transform translate-y-5 transition-all duration-500 delay-400 w-80 max-w-md">
            <div class="border-b-[1px] border-b-gray-300 px-6 py-3 w-full">
                <h2 class="text-xl font-medium text-center">Liste des créneaux disponibles</h2>
            </div>

            <div class="my-6 px-4 flex flex-col items-center w-full">
                <?php if (!empty($listeCreneaux)): ?>
                    <ul class="w-full">
                        <?php foreach ($listeCreneaux as $c): ?>
                            <a href="<?= base_url('patient/consult')?>" class="flex justify-between items-center border-b border-gray-200 py-2 px-4 hover:bg-gray-50 transition">
                                <span class="font-medium text-sm">Dr. <?= esc($c['nom_medecin']) ?></span>
                                <span class="text-gray-600 text-sm">
                                    <?= date('d/m', strtotime($c['cr_date'])) ?>
                                    - <?= date('H:i', strtotime($c['cr_hd'])) ?> à <?= date('H:i', strtotime($c['heure_fin'])) ?>
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <div class="flex flex-col items-center mt-10">
                        <i class="mdi mdi-calendar-blank text-5xl text-gray-300"></i>
                        <p class="text-center font-medium mt-3">Aucun créneau disponible <br>
                            <span class="text-gray-300 font-normal">pour le moment</span>
                        </p>
                    </div>
                <?php endif; ?>
            </div>

            <a href="<?= base_url('patient/consult') ?>" class="mb-10 py-2 px-3 rounded-md bg-dark-green text-white hover:bg-dark-green/80 duration-100 transition-colors flex items-center mx-auto">
                <i class="mdi mdi-plus mr-2"></i> Voir plus de créneaux
            </a>
        </div>


        <!-- Historique -->
        <div class="rounded-md w-[50vw] bg-white shadow-sm opacity-0 transform translate-y-5 transition-all duration-500 delay-500">
            <div class="border-b w-full flex items-center justify-between border-b-gray-300 py-2 px-6">
                <h2 class="text-xl font-medium mr-16">Historique de rendez-vous</h2>
                <a href="<?= base_url('patient/appointment') ?>" class="font-medium hover:text-light-green transition-colors duration-100">Voir tous les rendez-vous <i class="mdi mdi-arrow-right"></i></a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 text-gray-600 uppercase text-xs border-b">
                        <tr>
                            <th class="px-6 py-3">Date</th>
                            <th class="px-6 py-3">Début</th>
                            <th class="px-6 py-3">Fin</th>
                            <th class="px-6 py-3">Docteur</th>
                            <th class="px-6 py-3">Spécialité</th>
                            <th class="px-6 py-3">Sujet</th>
                            <th class="px-6 py-3">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <?php if (!empty($historique) && is_array($historique)): ?>
                            <?php foreach ($historique as $i => $appointment): ?>
                                <tr>
                                    <td class="px-4 py-2 text-sm font-medium text-gray-700"><?= date('d/m', strtotime($appointment['date'])) ?></td>
                                    <td class="px-4 py-2 text-sm text-gray-600"><?= esc($appointment['cr_d']) ?></td>
                                    <td class="px-4 py-2 text-sm text-gray-600"><?= esc($appointment['cr_f']) ?></td>
                                    <td class="px-4 py-2 text-sm font-semibold text-gray-800">
                                        Dr. <?= esc($appointment['nom_medecin']) ?> <?= esc($appointment['prenom_medecin']) ?>
                                    </td>
                                    <td class="px-4 py-2 text-sm text-blue-600 font-medium"><?= esc($appointment['spec_medecin']) ?></td>
                                    <td class="px-4 py-2 text-sm text-blue-600 font-medium"><?= esc($appointment['subject']) ?></td>
                                    <td class="px-4 py-2 text-sm">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                                        <?= $appointment['rd_statut'] === 'validé' ? 'bg-green-100 text-green-700' : ($appointment['rd_statut'] === 'annulé' ? 'bg-yellow-100 text-yellow-700' :
                                            'bg-red-100 text-red-700') ?>">
                                            <?= esc($appointment['rd_statut']) ?>
                                        </span>
                                    </td>


                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                    Aucun rendez-vous trouvé.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>