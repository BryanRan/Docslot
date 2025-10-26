<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashboardAdmin</title>
    <link rel="stylesheet" href="<?= base_url('css/output.css') ?>" />
</head>

<body>
    <div class="p-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold mb-4">Tableau de bord administrateur</h1>
            <div>
                <a href="<?= site_url('admin/creneaux/index') ?>"
                    class="bg-blue-600 text-white px-4 py-2 rounded duration-100 transition-colors hover:bg-blue-700 mb-4 inline-block">
                    Liste des créneaux
                </a>
                <a href="<?= site_url('admin/medecins/index') ?>"
                    class="bg-green-800 text-white px-4 py-2 rounded duration-100 transition-colors hover:bg-dark-green mb-4 inline-block">
                    Liste des médecins
                </a>
                <a href="<?= site_url('admin/logout') ?>"
                    class="bg-gray-900 text-white px-4 py-2 rounded duration-100 transition-colors hover:bg-gray-800 mb-4 inline-block">
                    Deconnexion
                </a>
            </div>
        </div>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="p-3 mb-4 text-green-700 bg-green-100 rounded">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="p-3 mb-4 text-red-700 bg-red-100 rounded">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <table class="w-full border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2">Nom du patient</th>
                    <th class="p-2">Date du RDV</th>
                    <th class="p-2">Heure</th>
                    <th class="p-2">Sujet</th>
                    <th class="p-2">Statut</th>
                    <th class="p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rendezvous as $rdv): ?>
                    <tr class="border-b">
                        <td class="p-2"><?= esc($rdv['nom'] . ' ' . $rdv['prenom']) ?></td>
                        <td class="p-2"><?= esc($rdv['date']) ?></td>
                        <td class="p-2"><?= esc($rdv['heure_debut']) ?> - <?= esc($rdv['heure_fin']) ?></td>
                        <td class="p-2"><?=esc($rdv['sujet'])?></td>
                        <td class="p-2">
                            <span class="px-2 py-1 text-sm rounded 
                            <?= $rdv['statut'] === 'validé' ? 'bg-green-100 text-green-800' : ($rdv['statut'] === 'refusé' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') ?>">
                                <?= esc($rdv['statut']) ?>
                            </span>
                        </td>
                        <td class="p-2">
                            <form action="<?= base_url('admin/updateStatus/' . $rdv['id']) ?>" method="post" class="flex space-x-2">
                                <button type="submit" name="status" value="validé" class="text-green-600 hover:underline">
                                    Valider
                                </button>
                                <button type="submit" name="status" value="refusé" class="text-red-600 hover:underline">
                                    Refuser
                                </button>
                            </form>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


</body>

</html>