<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('css/doctor.css') ?>" />
<!-- Main Content -->
<div class="w-full my-2 px-5 bg-light-green/5 rounded-lg flex flex-col">
    <div class="flex items-start mt-3 justify-between ">
        <div>
            <h1 class="text-2xl font-bold">Médecins</h1>
            <p class="text-gray-600">Voyez ici la liste des médecins de notre cabinet</p>
        </div>

        <button class="py-1 mt-2 font-medium hover:text-gray-600 transition-colors duration-100 hover:border hover:border-gray-200 px-3 rounded-md bg-white">
            <i class="mdi mdi-refresh mr-1"></i>Actualiser
        </button>
    </div>

    <!-- Doctors Table -->
    <div class="table-container my-5">
        <table class="doctors-table">
            <thead>
                <tr>
                    <th>Nom du médecin</th>
                    <th>Spécialité</th>
                    <th>Disponibilité</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($medecins)): ?>
                    <?php foreach ($medecins as $m): ?>
                        <tr class="table-row" data-availability="<?= esc($m['disponibilite']) ?>">
                            <td class="doctor-name">Dr. <?= esc($m['nom'] . ' ' . $m['prenom']) ?></td>
                            <td class="doctor-specialty"><?= esc($m['specialite']) ?></td>
                            <td>
                                <?php if ($m['disponibilite'] === 'disponible'): ?>
                                    <span class="status-badge available">
                                        <span class="status-dot"></span>
                                        Disponible
                                    </span>
                                <?php else: ?>
                                    <span class="status-badge busy">
                                        <span class="status-dot"></span>
                                        Occupé
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="text-right">
                                <?php if ($m['disponibilite'] === 'disponible'): ?>
                                    <a href="<?= site_url('patient/consult') ?>" class="action-btn">
                                        Voir créneaux
                                    </a>
                                <?php else: ?>
                                    <button class="py-2 rounded-md bg-gray-400 text-white px-2 cursor-not-allowed" disabled>
                                        Voir créneaux
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Aucun médecin trouvé</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</main>
</div>

<script src="<?= base_url('js/doctor.js') ?>"></script>

<?= $this->endSection() ?>