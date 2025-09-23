<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Gestion des créneaux</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Liste des créneaux</h1>

        <a href="<?= site_url('admin/creneaux/create') ?>"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
            + Ajouter un créneau
        </a>

        <div class="bg-white rounded-lg shadow p-4">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3">Date</th>
                        <th class="p-3">Heure début</th>
                        <th class="p-3">Heure fin</th>
                        <th class="p-3">Médecin</th>
                        <th class="p-3">Statut</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($creneaux)): ?>
                        <?php foreach ($creneaux as $c): ?>
                            <tr class="border-b">
                                <td class="p-3"><?= esc($c['date']) ?></td>
                                <td class="p-3"><?= esc($c['heure_debut']) ?></td>
                                <td class="p-3"><?= esc($c['heure_fin']) ?></td>
                                <td class="p-3"><?= esc($c['medecin_nom'] ?? 'Non assigné') ?></td>
                                <td class="p-3">
                                    <span class="px-2 py-1 rounded text-white 
                    <?= $c['statut'] === 'disponible' ? 'bg-green-500' : 'bg-red-500' ?>">
                                        <?= esc($c['statut']) ?>
                                    </span>
                                </td>
                                <td class="p-3 space-x-2">
                                    <a href="<?= site_url('admin/creneaux/edit/' . $c['id']) ?>"
                                        class="text-blue-600 hover:underline">Modifier</a>
                                    <a href="<?= site_url('admin/creneaux/delete/' . $c['id']) ?>"
                                        class="text-red-600 hover:underline"
                                        onclick="return confirm('Supprimer ce créneau ?')">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="p-3 text-center text-gray-500">Aucun créneau trouvé</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>