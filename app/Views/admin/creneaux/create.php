<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un créneau</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Ajouter un créneau</h1>

        <!-- Flash messages -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="p-3 mb-4 text-red-700 bg-red-100 rounded">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="p-3 mb-4 text-green-700 bg-green-100 rounded">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('admin/creneaux/store') ?>"
            class="bg-white shadow rounded-lg p-6 space-y-4">

            <div>
                <label class="block font-semibold">Date</label>
                <input type="date" name="date" required min="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d', strtotime('+30 days')) ?>"
                    class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-semibold">Heure début</label>
                <input type="time" name="heure_debut" required min="08:00" max="17:30" step="1800"
                    class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-semibold">Heure fin</label>
                <input type="time" name="heure_fin" required min="08:30" max="18:00" step="1800"
                    class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-semibold">Médecin</label>
                <select name="medecin_id" required class="w-full border rounded p-2">
                    <option value="">-- Sélectionner --</option>
                    <?php foreach ($medecins as $m): ?>
                        <option value="<?= $m['id'] ?>"><?= esc($m['nom'] . ' ' . $m['prenom']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex justify-end">
                <a href="<?= site_url('admin/creneaux/index') ?>"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 mr-2">Annuler</a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>

</body>

</html>