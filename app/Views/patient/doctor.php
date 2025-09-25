<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('css/doctor.css') ?>" />
<!-- Main Content -->
<div id="dashboard" class="w-full my-2 px-5 bg-light-green/5 rounded-lg flex flex-col opacity-0 translate-y-5 transition-all duration-500 ease-out">
    <main class="main-content">
        <div class="content-container">
            <div class="page-header">
                <div class="page-title-section">
                    <h1 class="page-title">Médecins</h1>
                    <p class="page-subtitle">Gérez tous vos rendez-vous médicaux en un seul endroit</p>
                </div>
            </div>

            <!-- Doctors Table -->
            <div class="table-container">
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
                                            <a href="<?= site_url('patient/consult')?>" class="action-btn">
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