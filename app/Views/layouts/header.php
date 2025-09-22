<header class="w-full p-2 bg-light-green/5 rounded-lg justify-between flex items-center">
    <!-- Search bar -->
    <form action="">
        <div class="relative w-full">
            <!-- Icône recherche -->
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                <i class="mdi mdi-magnify text-xl"></i>
            </span>

            <!-- Champ recherche -->
            <input
                type="text"
                name="search"
                placeholder="Rechercher un spécialiste"
                class="w-full pl-10 pr-20 py-2 text-sm text-gray-700 border border-gray-300 rounded-full 
                   focus:outline-none focus:ring-2 focus:ring-green-800 focus:border-green-600">

            <!-- Indice raccourci clavier -->
            <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                <kbd class="px-2 py-0.5 text-xs font-semibold text-gray-600 bg-gray-200 border rounded">
                    Alt+K
                </kbd>
            </span>
        </div>
    </form>

    <!-- Marque du profil -->
    <div class="flex items-center mr-2">
        <div class="w-10 h-10 justify-center flex items-center rounded-3xl bg-gradient-to-b from-dark-green to-light-green">
            <p class="text-xl text-white font-bold"><?= session()->get('user')['nom'][0] ?><?= session()->get('user')['prenom'][0] ?></p>
        </div>
        <div class="pl-2 text-sm">
            <p class="font-medium"><?= session()->get('user')['nom'] ?> <?= session()->get('user')['prenom'] ?></p>
            <p class="text-gray-600"><?= session()->get('user')['email'] ?></p>
        </div>
    </div>
</header>