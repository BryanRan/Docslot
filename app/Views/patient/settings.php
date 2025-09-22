<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex-1 flex flex-col overflow-hidden">
    <main class="flex-1 overflow-y-auto bg-gray-100 p-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Paramètres du compte</h1>
                <a href="#" class="flex items-center text-gray-600 hover:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.13L20.55 9.773m-1.932 7.379l-4.217 4.217A8.25 8.25 0 013.065 13.884l1.517-1.517" />
                    </svg>
                    <span class="text-sm font-medium">Actualiser</span>
                </a>
            </div>
            <p class="text-gray-600 mb-8">Gérez vos informations de connexion et vos paramètres de sécurité.</p>

            <div class="flex border-b border-gray-200 mb-6 text-sm font-medium">
                <a href="<?= base_url('patient/profile') ?>" class="px-6 py-3 border-b-2 text-gray-500 hover:text-green-600">
                    Informations personnelles
                </a>
                <a href="<?= base_url('patient/settings') ?>" class="px-6 py-3 border-b-2 border-green-600 text-green-600 font-semibold">
                    Paramètres du compte
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8 space-y-8">
                <h2 class="text-lg font-bold text-gray-800">Paramètres de connexion</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <span class="block text-sm font-medium text-gray-500">Adresse e-mail</span>
                        <p class="mt-1 text-lg font-semibold text-gray-800"><?= $user->email ?></p>
                    </div>
                    <div>
                        <span class="block text-sm font-medium text-gray-500">Mot de passe</span>
                        <p class="mt-1 text-lg font-semibold text-gray-800">********</p>
                    </div>
                </div>

                <button id="change-password-btn" class="flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 text-sm font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.932zm0 0L19.5 7.75" />
                    </svg>
                    Changer le mot de passe
                </button>

                <div id="password-form" class="hidden mt-4">
                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <ul>
                                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('patient/change-password') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="space-y-4">
                            <div>
                                <label for="new_passwordj" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                                <input type="password" name="new_password" id="new_password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                            </div>
                            <div>
                                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                                <input type="password" name="confirm_password" id="confirm_password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                            </div>
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Enregistrer</button>
                        </div>
                    </form>
                </div>

                <hr class="my-6 border-gray-200">

                <div>
                    <h2 class="text-lg font-bold text-gray-800 mb-2">Gestion du compte</h2>
                    <p class="text-sm text-gray-600 mb-4">La suppression de votre compte est une action permanente et ne peut pas être annulée. Toutes vos données seront définitivement supprimées.</p>
                    <a href="<?= base_url('')?>"><button id="delete-account-btn" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm font-medium">
                            Supprimer mon compte
                    </button></a>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    document.getElementById('change-password-btn').addEventListener('click', function() {
        const form = document.getElementById('password-form');
        form.classList.toggle('hidden');
    });

    document.getElementById('delete-account-btn').addEventListener('click', function() {
        if (confirm("Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible et toutes vos données seront perdues.")) {
            window.location.href = "<?= base_url('patient/delete-account') ?>";
        }
    });
</script>

<?= $this->endSection() ?>