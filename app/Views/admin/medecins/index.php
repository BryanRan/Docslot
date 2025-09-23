<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des médecins</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Liste des médecins</h1>

        <a href="<?= base_url('admin/medecins/create') ?>"
            class="bg-green-600 text-white px-4 py-2 rounded">+ Ajouter un médecin</a>

        <table class="w-full mt-4 border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">Nom</th>
                    <th class="p-2 border">Prénom</th>
                    <th class="p-2 border">Email</th>
                    <th class="p-2 border">Spécialité</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medecins as $m): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="p-2 border"><?= esc($m['nom']) ?></td>
                        <td class="p-2 border"><?= esc($m['prenom']) ?></td>
                        <td class="p-2 border"><?= esc($m['email']) ?></td>
                        <td class="p-2 border"><?= esc($m['specialite']) ?></td>
                        <td class="p-2 border text-center">
                            <a href="<?= base_url('admin/medecins/edit/' . $m['id']) ?>" class="text-blue-600">Modifier</a> |
                            <a href="<?= base_url('admin/medecins/delete/' . $m['id']) ?>" class="text-red-600" onclick="return confirm('Supprimer ce médecin ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</body>

</html>