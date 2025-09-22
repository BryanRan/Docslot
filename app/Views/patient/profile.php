<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="p-6 bg-white rounded-lg shadow-md h-full">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-semibold text-gray-800">Mon profil</h1>
            <p class="text-gray-500 mt-1">Consultez et mettez à jour vos informations personnelles.</p>
        </div>
        <button id="actualiser-button" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m-4.991 0v4.992" />
            </svg>
            Actualiser
        </button>
    </div>

    <div class="border-b border-gray-200 mb-6">
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
        <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800 space-y-4 grid grid-cols-1 md:grid-cols-2 gap-6" id="informations" role="tabpanel" aria-labelledby="informations-tab">
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
                <p class="mt-1 text-lg font-semibold text-gray-800">123 Rue de la République, 75001 Paris, France</p>
            </div>
            <div>
                <label class="text-gray-500 font-medium text-sm">Sexe</label>
                <p class="mt-1 text-lg font-semibold text-gray-800"><?= session()->get('user')['gender'] ?></p>
            </div>
            <div>
                <label class="text-gray-500 font-medium text-sm">Numéro de sécurité sociale</label>
                <p class="mt-1 text-lg font-semibold text-gray-800">1 85 05 75 123 456</p>
            </div>
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-lg font-semibold text-gray-800 mt-6">Personne à contacter en cas d'urgence</h3>
            </div>
            <div>
                <label class="text-gray-500 font-medium text-sm">Nom du contact</label>
                <p class="mt-1 text-lg font-semibold text-gray-800">Marie Dupont</p>
            </div>
            <div>
                <label class="text-gray-500 font-medium text-sm">Téléphone du contact</label>
                <p class="mt-1 text-lg font-semibold text-gray-800">+33 6 12 34 56 78</p>
            </div>
        </div>

        <!-- Paramètres du compte -->
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 space-y-4 grid grid-cols-1 md:grid-cols-2 gap-6" id="compte" role="tabpanel" aria-labelledby="compte-tab">
            <h2 class="text-xl font-semibold text-gray-800 col-span-1 md:col-span-2">Paramètres de connexion</h2>

            <div>
                <label class="text-gray-500 font-medium text-sm">Adresse e-mail</label>
                <p class="mt-1 text-lg font-semibold text-gray-800"><?= session()->get('user')['email'] ?></p>
            </div>
            <div>
                <label class="text-gray-500 font-medium text-sm">Mot de passe</label>
                <p class="mt-1 text-lg font-semibold text-gray-800">********</p>
            </div>

            <div class="col-span-1 md:col-span-2">
                <button id="change-password-button" class="mt-4 bg-green-600 text-white px-6 py-3 rounded-full hover:bg-green-700 transition-colors duration-200 shadow-lg flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14.25v2.25M6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                    </svg>
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
                <button class="bg-green-600 text-white px-6 py-3 rounded-full hover:bg-green-700 transition-colors duration-200 shadow-lg">Enregistrer</button>
            </div>
            
            <hr class="col-span-1 md:col-span-2 my-6 border-gray-200">

            <h2 class="text-xl font-semibold text-gray-800 col-span-1 md:col-span-2">Gestion du compte</h2>
            <div class="col-span-1 md:col-span-2">
                <h3 class="font-semibold text-red-500">Supprimer mon compte</h3>
                <p class="text-sm text-gray-600">La suppression de votre compte est une action permanente et ne peut pas être annulée. Toutes vos données seront définitivement supprimées.</p>
                <a href="<?= site_url('auth/logout') ?>" class="inline-block mt-4 bg-red-600 text-white px-6 py-3 rounded-full hover:bg-red-700 transition-colors duration-200 shadow-lg">Supprimer mon compte</a>
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
        passwordFields.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
</script>
<?= $this->endSection() ?>
