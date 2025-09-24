<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier un créneau</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Modifier un créneau</h1>

        <form method="post" action="<?= site_url('admin/creneaux/update/' . $creneau['id']) ?>"
            class="bg-white shadow rounded-lg p-6 space-y-4">

            <div>
                <label class="block font-semibold">Date</label>
                <input type="date" name="date" required
                    value="<?= esc($creneau['date']) ?>"
                    class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-semibold">Heure début</label>
                <input type="time" name="heure_debut" required
                    value="<?= esc($creneau['heure_debut']) ?>"
                    class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-semibold">Heure fin</label>
                <input type="time" name="heure_fin" required
                    value="<?= esc($creneau['heure_fin']) ?>"
                    class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-semibold">Médecin</label>
                <select name="medecin_id" required class="w-full border rounded p-2">
                    <?php foreach ($medecins as $m): ?>
                        <option value="<?= $m['id'] ?>"
                            <?= $creneau['medecin_id'] == $m['id'] ? 'selected' : '' ?>>
                            <?= esc($m['nom'] . ' ' . $m['prenom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block font-semibold">Statut</label>
                <select name="statut" class="w-full border rounded p-2">
                    <option value="disponible" <?= $creneau['statut'] == 'disponible' ? 'selected' : '' ?>>Disponible</option>
                    <option value="occupé" <?= $creneau['statut'] == 'occupé' ? 'selected' : '' ?>>Occupé</option>
                </select>
            </div>

            <div class="flex justify-end">
                <a href="<?= site_url('admin/creneaux/index') ?>"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 mr-2">Annuler</a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</body>

</html>