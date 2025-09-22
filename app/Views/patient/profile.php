<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="w-full my-2 px-5 bg-light-green/5 rounded-lg flex flex-col">
    <div class="flex items-start mt-3 justify-between ">
        <div>
            <h1 class="text-2xl font-bold">Profil</h1>
            <p class="text-gray-600">Consultez et mettez à jour vos informations personnelles.</p>
        </div>

        <button class="py-1 mt-2 font-medium hover:text-gray-600 transition-colors duration-100 hover:border hover:border-gray-200 px-3 rounded-md bg-white">
            <i class="mdi mdi-refresh mr-1"></i>Actualiser
        </button>
    </div>

    <div class="border-b border-gray-200 my-6">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" role="tablist">
            <li role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 text-green-600 border-green-600" id="informations-tab" data-tabs-target="#informations" type="button" role="tab" aria-controls="informations" aria-selected="true">Informations personnelles</button>
            </li>
            <li role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 text-gray-500 border-transparent" id="compte-tab" data-tabs-target="#compte" type="button" role="tab" aria-controls="compte" aria-selected="false">Paramètres du compte</button>
            </li>
        </ul>
    </div>

    <!-- Contenu des onglets -->
    <div id="myTabContent">
        <!-- Informations personnelles -->
        <div class="p-4 rounded-lg space-y-4 grid grid-cols-1 md:grid-cols-2 gap-6" id="informations" role="tabpanel" aria-labelledby="informations-tab">
            <div>
                <label class="text-gray-500 font-medium text-sm">Nom complet</label>
                <p class="mt-1 text-lg font-semibold text-gray-800"><?= session()->get('user')['nom'] ?> <?= session()->get('user')['prenom'] ?></p>
            </div>
            <div>
                <label class="text-gray-500 font-medium text-sm">Adresse e-mail</label>
                <p class="mt-1 text-lg font-semibold text-gray-800"><?= session()->get('user')['email'] ?></p>
            </div>
            <div>
                <label class="text-gray-500 font-medium text-sm">Numéro de téléphone</label>
                <p class="mt-1 text-lg font-semibold text-gray-800"><?= session()->get('user')['phone'] ?></p>
            </div>
            <div>
                <label class="text-gray-500 font-medium text-sm">Date de naissance</label>
                <p class="mt-1 text-lg font-semibold text-gray-800"><?= session()->get('user')['date_of_birth'] ?></p>
            </div>
            <div>
                <label class="text-gray-500 font-medium text-sm">Adresse</label>
                <p class="mt-1 text-lg font-semibold text-gray-800"><?= session()->get('user')['adresse'] ?></p>
            </div>
            <div>
                <label class="text-gray-500 font-medium text-sm">Sexe</label>
                <p class="mt-1 text-lg font-semibold text-gray-800"><?= session()->get('user')['gender'] ?></p>
            </div>
            <div>
                <label class="text-gray-500 font-medium text-sm">Numéro de sécurité sociale</label>
                <p class="mt-1 text-lg font-semibold text-gray-800"><?= session()->get('user')['numero_securite_sociale'] ?></p>
            </div>
        </div>

        <!-- Paramètres du compte -->
        <div class="p-4 rounded-lg space-y-4 grid grid-cols-1 md:grid-cols-2 gap-6" id="compte" role="tabpanel" aria-labelledby="compte-tab">
            <h2 class="text-xl font-semibold text-gray-800 col-span-1 md:col-span-2">Paramètres de connexion</h2>

            <div>
                <label class="text-gray-500 font-medium text-sm">Adresse e-mail</label>
                <p class="mt-1 text-lg font-semibold text-gray-800"><?= session()->get('user')['email'] ?></p>
            </div>
            <div>
                <label class="text-gray-500 font-medium text-sm">Mot de passe</label>
                <p class="mt-1 text-lg font-semibold text-gray-800 tracking-widest">
                    ••••••••
                </p>
            </div>


            <div class="col-span-1 md:col-span-2">
                <button id="change-password-button" class="mt-4 bg-dark-green text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors duration-200 shadow-lg flex items-center">
                    <i class="mdi mdi-pen w-5 h-5 mr-2"></i>
                    Changer le mot de passe
                </button>
            </div>

            <div id="password-fields" class="col-span-1 md:col-span-2 mt-4 space-y-4 hidden">
                <div class="max-w-md space-y-1">
                    <label for="new-password" class="text-gray-500 font-medium text-sm">Nouveau mot de passe</label>
                    <input type="password" id="new-password" class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 transition-colors duration-200">
                </div>
                <div class="max-w-md space-y-1">
                    <label for="confirm-password" class="text-gray-500 font-medium text-sm">Confirmer le mot de passe</label>
                    <input type="password" id="confirm-password" class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 transition-colors duration-200">
                </div>
                <button class="bg-dark-green text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors duration-200 shadow-lg">Enregistrer</button>
            </div>

            <hr class="col-span-1 md:col-span-2 my-6 border-gray-200">

            <h2 class="text-xl font-semibold text-gray-800 col-span-1 md:col-span-2">Gestion du compte</h2>
            <div class="col-span-1 md:col-span-2">
                <h3 class="font-semibold text-red-500">Supprimer mon compte</h3>
                <p class="text-sm text-gray-600">La suppression de votre compte est une action permanente et ne peut pas être annulée. Toutes vos données seront définitivement supprimées.</p>
                <a href="<?= site_url('patient/deleteAccount') ?>" class="inline-block mt-4 bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200 shadow-lg"><i class="text-white mdi mdi-delete-outline w-5 h-5 mr-2"></i> Supprimer mon compte</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('#myTab button');
        const tabContents = document.querySelectorAll('#myTabContent > div');
        const actualiserButton = document.getElementById('actualiser-button');

        function setActiveTab(tabId) {
            tabs.forEach(tab => {
                tab.classList.remove('text-green-600', 'border-green-600');
                tab.classList.add('text-gray-500', 'border-transparent');
            });
            tabContents.forEach(content => {
                content.classList.remove('grid');
                content.classList.add('hidden');
            });

            const activeTab = document.querySelector(`[data-tabs-target="${tabId}"]`);
            if (activeTab) {
                activeTab.classList.remove('text-gray-500', 'border-transparent');
                activeTab.classList.add('text-green-600', 'border-green-600');
                const activeContent = document.querySelector(tabId);
                activeContent.classList.remove('hidden');
                activeContent.classList.add('grid');
            }
        }

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const targetId = this.getAttribute('data-tabs-target');
                setActiveTab(targetId);
            });
        });

        // Définit l'onglet par défaut comme actif
        setActiveTab('#informations');

        // Gère le bouton d'actualisation
        actualiserButton.addEventListener('click', function() {
            window.location.reload();
        });
    });

    const changePasswordButton = document.getElementById('change-password-button');
    const passwordFields = document.getElementById('password-fields');

    changePasswordButton.addEventListener('click', function() {
        passwordFields.classList.remove('hidden');
        passwordFields.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });
</script>
<?= $this->endSection() ?>