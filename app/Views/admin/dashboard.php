<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashboardAdmin</title>
</head>

<body>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Tableau de bord administrateur</h1>

        <table class="w-full border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2">Nom du patient</th>
                    <th class="p-2">Date du RDV</th>
                    <th class="p-2">Heure</th>
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
                        <td class="p-2">
                            <span class="px-2 py-1 text-sm rounded 
                            <?= $rdv['statut'] === 'validé' ? 'bg-green-100 text-green-800' : ($rdv['statut'] === 'refusé' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') ?>">
                                <?= esc($rdv['statut']) ?>
                            </span>
                        </td>
                        <td class="p-2 space-x-2">
                            <a href="#" class="text-green-600 hover:underline">Valider</a>
                            <a href="#" class="text-red-600 hover:underline">Refuser</a>
                            <a href="#" class="text-gray-600 hover:underline">Annuler</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>