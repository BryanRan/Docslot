<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
        <div class="max-w-md w-full bg-white rounded-2xl shadow-lg p-6">
            <!-- Photo -->
            <div class="flex flex-col items-center">
                <img class="w-24 h-24 rounded-full shadow-md" src="https://via.placeholder.com/150" alt="Photo patient">
                <h2 class="mt-4 text-2xl font-bold text-gray-800"><?= session()->get('user')['nom'] ?> <?= session()->get('user')['prenom'] ?></h2>
                <p class="text-gray-500 text-sm">Patient ID: #P12345</p>
            </div>

            <!-- Infos principales -->
            <div class="mt-6 space-y-4">
                <div class="flex justify-between">
                    <span class="text-gray-600">Âge</span>
                    <span class="font-medium text-gray-800">32 ans</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Email</span>
                    <span class="font-medium text-gray-800"><?= session()->get('user')['email'] ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Téléphone</span>
                    <span class="font-medium text-gray-800">+261 32 12 345 67</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Adresse</span>
                    <span class="font-medium text-gray-800">Antananarivo, Madagascar</span>
                </div>
            </div>

            <!-- Boutons -->
            <div class="mt-6 flex space-x-3">
                <button class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-700 transition">
                    Modifier
                </button>
                <button class="flex-1 bg-gray-200 text-gray-700 py-2 px-4 rounded-lg shadow hover:bg-gray-300 transition">
                    Déconnexion
                </button>
            </div>
        </div>
    </div>

</body>

</html>