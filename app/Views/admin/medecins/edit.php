<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier un médecin</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Modifier un médecin</h1>

        <form method="post" action="<?= base_url('admin/medecins/update/' . $medecin['id']) ?>" class="space-y-4">
            <input type="text" name="nom" value="<?= esc($medecin['nom']) ?>" class="border p-2 w-full" required>
            <input type="text" name="prenom" value="<?= esc($medecin['prenom']) ?>" class="border p-2 w-full" required>
            <input type="email" name="email" value="<?= esc($medecin['email']) ?>" class="border p-2 w-full" required>
            <input type="text" name="phone" value="<?= esc($medecin['phone']) ?>" class="border p-2 w-full">
            <input type="text" name="specialite" value="<?= esc($medecin['specialite']) ?>" class="border p-2 w-full" required>
            <textarea name="description" class="border p-2 w-full"><?= esc($medecin['description']) ?></textarea>

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Mettre à jour</button>
                <a href="<?= base_url('admin/medecins/index') ?>" class="bg-gray-500 text-white px-4 py-2 rounded">Annuler</a>
            </div>
        </form>
    </div>

</body>

</html>