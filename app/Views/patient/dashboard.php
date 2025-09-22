<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div id="dashboard" class="w-full my-2 px-5 bg-light-green/5 rounded-lg flex flex-col opacity-0 translate-y-5 transition-all duration-500 ease-out">
    <!-- Start -->
    <div class="flex items-start mt-3 justify-between opacity-0 transform translate-y-5 transition-all duration-500 delay-100">
        <div>
            <h1 class="text-2xl font-bold">Dashboard</h1>
            <p class="text-gray-600">Bienvenue dans votre espace patient. Ici vous verrez vos informations.</p>
        </div>

        <button class="py-1 mt-2 font-medium hover:text-gray-600 transition-colors duration-100 hover:border hover:border-gray-200 px-3 rounded-md bg-white">
            <i class="mdi mdi-refresh mr-1"></i>Actualiser
        </button>
    </div>

    <!-- Summary -->
    <div class="mt-5 flex w-full justify-between items-center space-x-4">
        <!-- Carte exemple -->
        <?php
        $cards = [
            ['title' => 'Total de demandes', 'icon' => 'mdi-calendar-blank', 'count' => 2, 'color' => 'dark-green', 'bg' => 'bg-light-green/20'],
            ['title' => 'Rendez-vous en cours', 'icon' => 'mdi-clock-time-three-outline', 'count' => 2, 'color' => 'green-400', 'bg' => 'bg-blue-100'],
            ['title' => 'Rendez-vous annulés', 'icon' => 'mdi-close', 'count' => 3, 'color' => 'red-500', 'bg' => 'bg-red-100'],
            ['title' => 'Rappel', 'icon' => 'mdi-alert', 'count' => null, 'color' => 'dark-green', 'bg' => 'bg-white'],
        ];
        foreach ($cards as $i => $card): ?>
            <div class="bg-white shadow-sm hover:scale-105 duration-200 transition-all rounded-md p-5 opacity-0 transform translate-y-5" style="transition-delay: <?= 150 * $i ?>ms">
                <h3 class="font-medium text-gray-600"><?= $card['title'] ?></h3>
                <?php if ($card['count'] !== null): ?>
                    <div class="<?= $card['bg'] ?> mt-2 mx-auto shadow-md h-16 w-16 flex items-center justify-center rounded-md">
                        <i class="mdi <?= $card['icon'] ?> text-5xl text-<?= $card['color'] ?>"></i>
                    </div>
                    <p class="mt-2"><strong class="text-xl text-<?= $card['color'] ?>"><?= $card['count'] ?></strong> <?= strtolower($card['title']) ?></p>
                <?php else: ?>
                    <p class="mt-2 font-medium">Rendez-vous le plus proche</p>
                    <p class="mb-3">avec Dr. Emily Carter<br>Jeudi, 12 Décembre 2014</p>
                    <a href="<?= base_url('patient/appointment') ?>" class="py-1 px-2 rounded-md text-white bg-light-green">Voir les détails</a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Historique et créneaux -->
    <div class="mt-5 flex w-full mb-5 justify-between space-x-4">
        <!-- Créneaux -->
        <div class="bg-white shadow-sm rounded-md flex items-center flex-col opacity-0 transform translate-y-5 transition-all duration-500 delay-400">
            <div class="border-b-[1px] border-b-gray-300 px-16 py-3">
                <h2 class="text-xl font-medium">Liste des créneaux</h2>
            </div>
            <div class="mx-20 my-10 flex flex-col items-center">
                <i class="mdi mdi-calendar-blank text-5xl text-gray-300"></i>
                <p class="text-center font-medium">Aucun créneaux disponible <br> <span class="text-gray-300 font-normal">pour le moment</span></p>
            </div>
            <a href="" class="mb-10"><button class="py-2 px-3 rounded-md bg-dark-green text-white"> <i class="mdi mdi-plus mr-2"></i> Rechercher des créneaux</button></a>
        </div>

        <!-- Historique -->
        <div class="rounded-md bg-white shadow-sm opacity-0 transform translate-y-5 transition-all duration-500 delay-500">
            <div class="border-b w-full flex items-center justify-between border-b-gray-300 py-2 px-6">
                <h2 class="text-xl font-medium mr-16">Historique de rendez-vous</h2>
                <form method="GET" action="<?= base_url('patient/history') ?>" class="flex items-center space-x-2">
                    <select name="status" class="border rounded-md px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-light-green">
                        <option value="">Tous les statuts</option>
                        <option value="confirmed" <?= (service('request')->getGet('status') == 'confirmed') ? 'selected' : '' ?>>Confirmés</option>
                        <option value="cancelled" <?= (service('request')->getGet('status') == 'cancelled') ? 'selected' : '' ?>>Annulés</option>
                        <option value="pending" <?= (service('request')->getGet('status') == 'pending') ? 'selected' : '' ?>>En attente</option>
                    </select>
                    <button type="submit" class="ml-2 p-2 text-gray-500 hover:text-dark-green transition flex items-center">
                        <i class="mdi mdi-filter-variant text-xl"></i>
                        <span class="ml-1 hidden sm:inline text-sm">Filtrer</span>
                    </button>
                </form>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 text-gray-600 uppercase text-xs border-b">
                        <tr>
                            <th class="px-6 py-3">Date</th>
                            <th class="px-6 py-3">Docteur</th>
                            <th class="px-6 py-3">Spécialité</th>
                            <th class="px-6 py-3">Sujet</th>
                            <th class="px-6 py-3">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <?php if (!empty($appointments) && is_array($appointments)): ?>
                            <?php foreach ($appointments as $i => $appointment): ?>
                                <?php
                                $initials = strtoupper(substr($appointment['doctor_nom'], 0, 1) . substr($appointment['doctor_prenom'], 0, 1));
                                $statusColors = [
                                    'confirmed' => 'text-green-600 bg-green-100',
                                    'cancelled' => 'text-red-600 bg-red-100',
                                    'pending'   => 'text-yellow-600 bg-yellow-100'
                                ];
                                $statusClass = $statusColors[$appointment['status']] ?? 'text-gray-600 bg-gray-100';
                                ?>
                                <tr class="hover:bg-gray-50 opacity-0 transform translate-y-2 transition-all duration-500" style="transition-delay: <?= 50 * $i ?>ms">
                                    <td class="px-6 py-4">
                                        <p class="font-medium"><?= esc(date('d.m.Y', strtotime($appointment['date']))) ?></p>
                                        <p class="text-gray-500 text-xs"><?= esc(date('H:i', strtotime($appointment['date']))) ?></p>
                                    </td>
                                    <td class="px-6 py-4 flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-green-500 to-light-green flex items-center justify-center text-white font-bold">
                                            <?= esc($initials) ?>
                                        </div>
                                        <span>Dr. <?= esc($appointment['doctor_nom']) ?> <?= esc($appointment['doctor_prenom']) ?></span>
                                    </td>
                                    <td class="px-6 py-4"><?= esc($appointment['specialite']) ?></td>
                                    <td class="px-6 py-4"><?= esc($appointment['sujet']) ?></td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 rounded-md text-xs font-medium <?= $statusClass ?>">
                                            <?= ucfirst(esc($appointment['status'])) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
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