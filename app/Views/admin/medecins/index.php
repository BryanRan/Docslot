<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des médecins</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen p-6">

    <body class="bg-gray-100">
        <div class="container mx-auto p-6">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold mb-4">Liste des médecins</h1>
                <div>
                    <a href="<?= site_url('admin/dashboard') ?>"
                        class="bg-blue-600 text-white px-4 py-2 rounded duration-100 transition-colors hover:bg-blue-700 mb-4 inline-block">
                        Dashboard
                    </a>
                    <a href="<?= site_url('admin/creneaux/index') ?>"
                        class="bg-green-800 text-white px-4 py-2 rounded duration-100 transition-colors hover:bg-green-900 mb-4 inline-block">
                        Liste des créneaux
                    </a>
                </div>
            </div>

            <a href="<?= site_url('admin/medecins/create') ?>"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
                + Ajouter un médecin
            </a>

            <div class="bg-white rounded-lg shadow p-4">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-3">Nom</th>
                            <th class="p-3">Prénom</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Spécialité</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($medecins)): ?>
                            <?php foreach ($medecins as $m): ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3"><?= esc($m['nom']) ?></td>
                                    <td class="p-3"><?= esc($m['prenom']) ?></td>
                                    <td class="p-3"><?= esc($m['email']) ?></td>
                                    <td class="p-3"><?= esc($m['specialite']) ?></td>
                                    <td class="p-3 space-x-2">
                                        <a href="<?= site_url('admin/medecins/edit/' . $m['id']) ?>"
                                            class="text-blue-600 hover:underline">Modifier</a>
                                        <a href="<?= site_url('admin/medecins/delete/' . $m['id']) ?>"
                                            class="text-red-600 hover:underline"
                                            onclick="return confirm('Supprimer ce médecin ?')">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="p-3 text-center text-gray-500">Aucun médecin trouvé</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>


</body>

</html>