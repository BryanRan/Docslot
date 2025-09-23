<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un médecin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Ajouter un médecin</h1>

        <form method="post" action="<?= base_url('admin/medecins/store') ?>" class="space-y-4">
            <input type="text" name="nom" placeholder="Nom" class="border p-2 w-full" required>
            <input type="text" name="prenom" placeholder="Prénom" class="border p-2 w-full" required>
            <input type="email" name="email" placeholder="Email" class="border p-2 w-full" required>
            <input type="text" name="phone" placeholder="Téléphone" class="border p-2 w-full">
            <input type="text" name="specialite" placeholder="Spécialité" class="border p-2 w-full" required>
            <textarea name="description" placeholder="Description" class="border p-2 w-full"></textarea>

            <div class="flex gap-2">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Enregistrer</button>
                <a href="<?= base_url('admin/medecins/index') ?>" class="bg-gray-500 text-white px-4 py-2 rounded">Annuler</a>
            </div>
        </form>
    </div>

</body>

</html>