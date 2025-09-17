<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center min-h-screen">

    <?php if (session()->has('errors')): ?>
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-xl px-4">
            <div id="alert" class="flex items-center bg-red-50 border-l-4 border-red-500 p-4 rounded-lg shadow-md
            opacity-0 -translate-y-6 transition-all duration-500 ease-out">
                <!-- Icône -->
                <svg class="w-6 h-6 text-red-500 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-12.728 12.728m0-12.728l12.728 12.728" />
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

        <!-- Inclusion du JS séparé -->
        <script src="<?= base_url('js/alert.js') ?>"></script>
    <?php endif; ?>

    <div class="w-full mx-52 rounded-lg bg-white p-8 flex justify-between">
        <!-- Form -->
        <div class="h-[32rem] w-[23rem]">
            <img src="<?= base_url('img/logo.svg') ?>" alt="Logo" class="w-24 h-24">
            <p class="font-bold text-lg pl-7">Docslot</p>
            <h2 class="mt-3 font-bold text-3xl pl-7">Connexion</h2>


            <form method="POST" class="space-y-4 mt-10 pl-7">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" placeholder="votre email"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-black">
                </div>
                <div>
                    <label for="mot_de_passe" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="votre mot de passe"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-black">
                </div>
                
                <button type="submit"
                    class="w-full bg-black text-white py-2 rounded-lg hover:bg-white hover:outline hover:outline-2 hover:text-black hover:outline-black transition-colors font-semibold">
                    Se connecter
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-4">
                Pas de compte ? <a href="<?= base_url('auth/signup') ?>" class="text-black font-semibold hover:underline">S'inscrire</a>
            </p>
        </div>

        <!-- Presentation -->
        <div class="relative h-[32rem] w-96 rounded-lg overflow-hidden">
            <div class="absolute inset-0 bg-no-repeat bg-cover"
                style="background-image: url(<?= base_url('img/bureau.jpg') ?>);">
            </div>
            <div class="absolute inset-0 bg-black bg-opacity-30"></div>
            <div class="relative z-10 p-4 text-white">
                <img src="<?= base_url('img/logo.svg') ?>" alt="Logo" class="w-24 h-24">
                <h2 class="text-xl font-bold">Docslot</h2>
                <p>Votre gestionnaire de rendez-vous médical</p>
                <p class="text-2xl font-bold mt-10">Créez votre compte pour accéder à nos services</p>
                <div class="bg-white rounded-xl mt-12 py-3 px-4 text-black">
                    <h3 class="text-lg font-semibold">Prenez un rendez-vous dans notre cabinet en quelques clics</h3>
                    <p class="text-sm">Gérez vos consultations médicales facilement et rapidement grâce à notre système de rendez-vous simplifié</p>
                    <p class="text-sm text-end">REJOIGNEZ NOUS</p>
                </div>
            </div>
        </div>

    </div>
</body>

</html>