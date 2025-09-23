<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/transform.css') ?>" rel="stylesheet">

</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <?php if (session()->has('errors')): ?>
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-xl px-4">
            <div id="alert" class="flex items-center bg-red-50 border-l-4 border-red-500 p-4 rounded-lg shadow-md
            opacity-0 -translate-y-6 transition-all duration-500 ease-out">
                <!-- Icône -->
                <svg class="w-6 h-6 text-red-500 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18.364 5.636l-12.728 12.728m0-12.728l12.728 12.728" />
                </svg>

                <!-- Message -->
                <div class="ml-3">
                    <strong class="block text-red-800 font-semibold">Erreur :</strong>
                    <ul class="list-disc list-inside text-red-700 text-sm mt-1">
                        <?php foreach (session('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
        <script src="<?= base_url('js/alert.js') ?>"></script>
    <?php endif; ?>

    <div class="w-full mx-44 rounded-lg bg-white p-8 flex justify-between shadow-xl overflow-hidden">
        <!-- Formulaire Signup -->
        <div class="h-[32rem] w-[25rem] animate-fadeLeft opacity-0 flex flex-col">
            <a href="<?= base_url('/') ?>" class="font-bold text-lg pl-7">Docslot</a>
            <h2 class="mt-3 font-bold text-3xl pl-7">Inscription</h2>

            <!-- Conteneur scrollable pour les champs -->
            <div class=" mt-6 pl-7 overflow-y-auto space-y-4">
                <form method="POST" class="space-y-4">
                    <!-- Nom + Prénom -->
                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                            <input type="text" id="nom" name="nom" placeholder="Votre nom"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
                        </div>
                        <div class="flex-1">
                            <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                            <input type="text" id="prenom" name="prenom" placeholder="Votre prénom"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
                        </div>
                    </div>

                    <!-- Adresse + Secu -->
                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <label for="adresse" class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                            <input type="text" id="adresse" name="adresse" placeholder="Votre adresse"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
                        </div>
                        <div class="flex-1">
                            <label for="numero_securite_sociale" class="block text-sm font-medium text-gray-700 mb-1">N° sécurité sociale</label>
                            <input type="text" id="numero_securite_sociale" name="numero_securite_sociale" placeholder="N° sécurité sociale"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
                        </div>
                    </div>

                    <!-- Email + Téléphone -->
                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" placeholder="Votre email"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
                        </div>
                        <div class="flex-1">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                            <input type="tel" id="phone" name="phone" placeholder="N° de téléphone"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
                        </div>
                    </div>

                    <!-- Date de naissance + Genre -->
                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-1">Date de naissance</label>
                            <input type="date" id="date_of_birth" name="date_of_birth"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
                        </div>
                        <div class="flex-1">
                            <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Genre</label>
                            <select id="gender" name="gender"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
                                <option value="">Sélectionnez</option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>
                    </div>

                    <!-- Mot de passe + Confirmation -->
                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <label for="mot_de_passe" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                            <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Votre mot de passe"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
                        </div>
                        <div class="flex-1">
                            <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmez votre mot de passe" required
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
                        </div>
                    </div>
                </form>
            </div>

            <!-- Bouton fixe -->
            <button type="submit"
                class="w-full bg-gray-900 text-white py-2 rounded-lg hover:bg-white hover:outline hover:outline-2 hover:text-gray-900 hover:outline-gray-900 transition-colors font-semibold mt-4">
                S'inscrire
            </button>

            <p class="text-center text-sm text-gray-500 mt-4">
                Déjà un compte ? <a href="<?= base_url('auth/login') ?>" class="text-gray-900 font-semibold hover:underline">Se connecter</a>
            </p>
        </div>

        <!-- Presentation -->
        <div class="relative h-[32rem] w-96 rounded-xl overflow-hidden group perspective">
            <!-- Image de fond avec animation de zoom et tilt -->
            <div class="absolute inset-0 bg-no-repeat bg-cover transition-transform duration-[3000ms] ease-out 
        group-hover:scale-110 group-hover:rotate-1 group-hover:-skew-y-2"
                style="background-image: url(<?= base_url('img/bureau.jpg') ?>);">
            </div>

            <!-- Overlay foncé -->
            <div class="absolute inset-0 bg-gray-900 bg-opacity-40"></div>

            <!-- Contenu -->
            <div class="relative z-10 p-6 text-white transform transition-transform duration-700 ease-out
        group-hover:rotate-1 group-hover:skew-y-1 group-hover:scale-105">

                <img src="<?= base_url('img/logo.svg') ?>" alt="Logo"
                    class="w-20 h-20 mb-4 transform transition-transform duration-700 group-hover:rotate-6 group-hover:scale-110">

                <h2 class="text-2xl font-bold mb-2 animate-fadeUp opacity-0">Docslot</h2>
                <p class="text-sm animate-fadeUp opacity-0">Votre gestionnaire de rendez-vous médical</p>

                <p class="text-2xl font-bold mt-8 leading-snug animate-fadeUp opacity-0">
                    Créez votre compte pour accéder à nos services
                </p>

                <!-- Carte animée -->
                <div class="bg-white rounded-xl mt-10 py-4 px-5 text-gray-900 shadow-lg transform transition-all duration-700
            hover:scale-110 hover:-rotate-2 animate-fadeUp opacity-0">
                    <h3 class="text-lg font-semibold">Prenez un rendez-vous en quelques clics</h3>
                    <p class="text-sm mt-1">Gérez vos consultations médicales facilement et rapidement grâce à notre système simplifié</p>
                    <p class="text-sm text-end font-bold text-gray-700 mt-2 tracking-wide">REJOIGNEZ-NOUS 🩺</p>
                </div>
            </div>
        </div>
    </div>


    <!-- JS pour animations présentation -->
    <script src="<?= base_url('js/alert.js') ?>"></script>
    <script src="<?= base_url('js/transform.js') ?>"></script>


</body>

</html>