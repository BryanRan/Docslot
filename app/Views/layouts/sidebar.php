<?php
$current = service('uri')->getSegment(2); // Segment 2 correspond à la page après 'patient'
?>

<aside class="w-60 mt-2 h-[94vh] justify-between mx-2 px-5 bg-light-green/5 rounded-lg flex flex-col">
    <!-- Logo -->
    <div class="flex items-center">
        <img src="<?= base_url('img/logo.svg') ?>" class="w-12 h-12" alt="">
        <p class="font-bold text-black">Docslot</p>
    </div>

    <!-- Menu -->
    <div>
        <h2 class="text-neutral-500 text-sm font-medium mx-5">MENU</h2>
        <div>
            <!-- Dashboard -->
            <a href="<?= base_url('patient/dashboard') ?>">
                <button
                    class="font-regular mt-2 text-start px-5 py-2 w-full rounded-md 
                    <?= ($current == 'dashboard') ? 'bg-gradient-to-r from-dark-green to-light-green text-white shadow shadow-dark-green/35' : 'hover:bg-light-green/70 hover:text-white/50 text-neutral-500' ?>">
                    <i class="mdi mdi-view-dashboard mr-2"></i>
                    Dashboard
                </button>
            </a>

            <!-- Rendez-vous -->
            <a href="<?= base_url('patient/appointment') ?>">
                <button
                    class="font-regular mt-2 text-start px-5 py-2 w-full rounded-md 
                    <?= ($current == 'appointment') ? 'bg-gradient-to-r from-dark-green to-light-green text-white shadow shadow-dark-green/35' : 'hover:bg-light-green/70 hover:text-white/50 text-neutral-500' ?>">
                    <i class="mdi mdi-calendar-blank-outline mr-2"></i>
                    Mes rendez-vous
                </button>
            </a>

            <!-- Créneaux -->
            <a href="<?= base_url('patient/consult') ?>">
                <button
                    class="font-regular mt-2 text-start px-5 py-2 w-full rounded-md
                    <?= ($current == 'consult') ? 'bg-gradient-to-r from-dark-green to-light-green text-white shadow shadow-dark-green/35' : 'hover:bg-light-green/70 hover:text-white/50 text-neutral-500' ?>">
                    <i class="mdi mdi-stethoscope mr-2"></i>
                    Créneaux
                </button>
            </a>

            <!-- Médecins -->
            <a href="<?= base_url('patient/doctor') ?>">
                <button
                    class="font-regular mt-2 text-start px-5 py-2 w-full rounded-md
                    <?= ($current == 'doctor') ? 'bg-gradient-to-r from-dark-green to-light-green text-white shadow shadow-dark-green/35' : 'hover:bg-light-green/70 hover:text-white/50 text-neutral-500' ?>">
                    <i class="mdi mdi-doctor mr-2"></i>
                    Médecins
                </button>
            </a>
        </div>
    </div>

    <!-- Autre -->
    <div class="">
        <h2 class="text-neutral-500 text-sm font-medium mx-5">AUTRE</h2>
        <div>
            <!-- Profil -->
            <a href="<?= base_url('patient/profile') ?>">
                <button
                    class="font-regular mt-2 text-start px-5 py-2 w-full rounded-md 
                    <?= ($current == 'profile') ? 'bg-gradient-to-r from-dark-green to-light-green text-white shadow shadow-dark-green/35' : 'hover:bg-light-green/70 hover:text-white/50 text-neutral-500' ?>">
                    <i class="mdi mdi-account-circle-outline mr-2"></i>
                    Profil
                </button>
            </a>

            <!-- Déconnexion -->
            <a href="<?= base_url('auth/logout') ?>">
                <button
                    class="font-regular mt-2 text-start px-5 py-2 w-full rounded-md 
                    <?= ($current == 'logout') ? 'bg-gradient-to-r from-dark-green to-light-green text-white' : 'hover:bg-light-green/70 hover:text-white/50 text-neutral-500' ?>">
                    <i class="mdi mdi-logout mr-2"></i>
                    Déconnexion
                </button>
            </a>
        </div>
    </div>

    <!-- Discount -->
    <div class="mb-6">
        <div class="rounded-lg bg-gradient-to-b p-3 from-black-green to-light-green">
            <div class="rounded-2xl h-7 w-7 flex items-center justify-center text-light-green text-lg bg-white">
                <i class="mdi mdi-clipboard-outline"></i>
            </div>
            <p class="text-white mt-2 font-semibold">Prenez rendez-vous</p>
            <p class="text-gray-300 text-sm">Réservez pour votre prochain rendez-vous médical</p>
            <a href="<?= base_url('patient/appointment') ?>">
                <button class="text-light-green text-sm font-bold px-2 py-1.5 mt-4 w-full rounded-lg bg-white">
                    Prendre rendez-vous
                </button>
            </a>
        </div>
    </div>
</aside>