<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Connexion</h2>

        <!-- Zone d'affichage des erreurs globales -->
        <?php if (session()->has('errors')): ?>
            <div class="mb-4 p-3 rounded-lg bg-red-100 border border-red-400 text-red-700">
                <ul class="list-disc list-inside text-sm">
                    <?php foreach (session('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" placeholder="votre email"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="mot_de_passe" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="votre mot de passe"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="flex items-center justify-between">
                <label class="flex items-center space-x-2 text-sm">
                    <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <span>Se souvenir de moi</span>
                </label>
                <a href="#" class="text-sm text-blue-600 hover:underline">Mot de passe oublié ?</a>
            </div>
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                Se connecter
            </button>
        </form>
        <p class="text-center text-sm text-gray-500 mt-4">
            Pas de compte ? <a href="<?= base_url('auth/signup') ?>" class="text-blue-600 hover:underline">S'inscrire</a>
        </p>
    </div>
</body>

</html>