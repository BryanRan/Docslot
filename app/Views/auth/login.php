<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docslot</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/transform.css') ?>" rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center min-h-screen">

    <?php if (session()->has('errors')): ?>
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-xl px-4">
            <div id="alert"
                class="flex items-center bg-red-50 border-l-4 border-red-500 p-4 rounded-lg shadow-md
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

    <div class="w-full mx-52 rounded-lg bg-white p-8 flex justify-between shadow-2xl shadow-light-green/15 overflow-hidden">
        <!-- Form -->
        <div class="h-[32rem] w-[23rem] animate-fadeLeft opacity-0">
            <img src="<?= base_url('img/Logo 1.png') ?>" alt="" class="h-16 w-16 ml-7">
            <h2 class="mt-3 font-bold text-3xl text-light-green pl-7 animate-fadeUp opacity-0">Connexion</h2>

            <form method="POST" class="space-y-4 mt-10 pl-7 animate-fadeUp opacity-0">
                <div>
                    <label for="email" class="block text-sm font-medium text-light-green mb-1">Email</label>
                    <input type="email" id="email" name="email" placeholder="votre email"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-light-green focus:border-light-green transition-transform duration-300 hover:scale-105">
                </div>
                <div>
                    <label for="mot_de_passe" class="block text-sm font-medium text-light-green mb-1">Mot de passe</label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="votre mot de passe"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-light-green focus:border-light-green transition-transform duration-300 hover:scale-105">
                </div>

                <button type="submit"
                    class="w-full bg-light-green text-white py-2 rounded-lg hover:bg-white hover:outline hover:outline-2 hover:text-light-green hover:outline-light-green transition-all duration-300 font-semibold transform shadow-md">
                    Se connecter
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-4 animate-fadeUp opacity-0">
                Pas de compte ? <a href="<?= base_url('auth/signup') ?>"
                    class="text-light-green font-semibold hover:underline">S'inscrire</a>
            </p>
            <hr class="mt-6 ml-6">
            <p class="text-center text-sm text-gray-500 mt-4 animate-fadeUp opacity-0">
                Revenir à l'écran <a href="<?= base_url('/') ?>"
                    class="text-light-green font-semibold hover:underline">d'accueil</a>
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

                <img src="<?= base_url('img/Logo 1.png') ?>" alt="Logo"
                    class="w-16 h-16 mb-4 transform transition-transform duration-700 group-hover:rotate-6 group-hover:scale-110">

                <h2 class="text-2xl font-bold mb-2 animate-fadeUp opacity-0">Docslot</h2>
                <p class="text-sm animate-fadeUp opacity-0">Votre gestionnaire de rendez-vous médical</p>

                <p class="text-2xl font-bold mt-8 leading-snug animate-fadeUp opacity-0">
                    Créez votre compte pour accéder à nos services
                </p>

                <!-- Carte animée -->
                <div class="bg-white rounded-xl mt-16 py-4 px-5 text-gray-900 shadow-lg transform transition-all duration-700
            hover:scale-110 hover:-rotate-2 animate-fadeUp opacity-0">
                    <h3 class="text-lg text-light-green font-semibold">Prenez un rendez-vous en quelques clics</h3>
                    <p class="text-sm mt-1">Gérez vos consultations médicales facilement et rapidement grâce à notre système simplifié</p>
                    <p class="text-sm text-end font-bold text-light-green mt-2 tracking-wide">REJOIGNEZ-NOUS</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Script pour déclencher les animations avec un petit délai -->
    <script src="<?= base_url('js/transform.js') ?>"></script>
</body>

</html>