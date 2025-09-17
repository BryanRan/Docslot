<?php
$current = service('uri')->getSegment(1);
?>

<aside class="w-60 h-[96vh] mx-2 my-2 px-5 bg-neutral-300/40 rounded-lg flex flex-col">
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
                <?= ($current == 'dashboard')
                    ? 'bg-gradient-to-r from-dark-green to-light-green text-white'
                    : 'hover:bg-light-green/70 hover:text-white/50 text-neutral-500' ?>">
                    <i class="mdi mdi-view-dashboard mr-2"></i>
                    Dashboard
                </button>
            </a>

            <!-- Rendez-vous -->
            <a href="<?= base_url('patient/appointment') ?>">
                <button
                    class="font-regular mt-2 text-start px-5 py-2 w-full rounded-md 
                <?= ($current == 'rendezvous')
                    ? 'bg-gradient-to-r from-dark-green to-light-green text-white'
                    : 'hover:bg-light-green/70 hover:text-white/50 text-neutral-500' ?>">
                    <i class="mdi mdi-calendar-blank-outline mr-2"></i>
                    Mes rendez-vous
                </button>
            </a>

            <!-- Créneaux -->
            <a href="<?= base_url('patient/consult') ?>">
                <button
                    class=" font-regular mt-2 text-start px-5 py-2 w-full rounded-md
                    <?= ($current == 'creneaux')
                        ? 'bg-gradient-to-r from-dark-green to-light-green text-white'
                        : 'hover:bg-light-green/70 hover:text-white/50 text-neutral-500' ?>">
                    <i class="mdi mdi-stethoscope mr-2"></i>
                    Créneaux
                </button>
            </a>

            <!-- Médecins -->
            <a href="<?= base_url('patient/doctor') ?>">
                <button
                    class=" font-regular mt-2 text-start px-5 py-2 w-full rounded-md
                        <?= ($current == 'medecins')
                            ? 'bg-gradient-to-r from-dark-green to-light-green text-white'
                            : 'hover:bg-light-green/70 hover:text-white/50 text-neutral-500' ?>">
                    <i class="mdi mdi-doctor mr-2"></i>
                    Médecins
                </button>
            </a>
        </div>
    </div>

    <!-- Autre -->
    <div class=" mt-2">
        <h2 class="text-neutral-500 text-sm font-medium mx-5">AUTRE</h2>
        <div>
            <!-- Profil -->
            <a href="<?= base_url('patient/profile') ?>">
                <button
                    class="font-regular mt-2 text-start px-5 py-2 w-full rounded-md 
                <?= ($current == 'profil')
                    ? 'bg-gradient-to-r from-dark-green to-light-green text-white'
                    : 'hover:bg-light-green/70 hover:text-white/50 text-neutral-500' ?>">
                    <i class="mdi mdi-account-circle-outline mr-2"></i>
                    Profil
                </button>
            </a>

            <!-- Déconnexion -->
            <a href="<?= base_url('auth/logout') ?>">
                <button
                    class="font-regular mt-2 text-start px-5 py-2 w-full rounded-md 
                <?= ($current == 'logout')
                    ? 'bg-gradient-to-r from-dark-green to-light-green text-white'
                    : 'hover:bg-light-green/70 hover:text-white/50 text-neutral-500' ?>">
                    <i class="mdi mdi-logout mr-2"></i>
                    Deconnexion
                </button>
            </a>
        </div>
    </div>

    <!-- Discount -->
    <div class="mt-2">
        <div class="rounded-lg bg-gradient-to-b p-2 h-40 from-black-green to-light-green">
            <div class="rounded-2xl h-7 text-light-green text-lg text-center w-7 bg-white">
                <i class="mdi mdi-clipboard-outline"></i>
            </div>
            <p class="text-white mt-1.5">Prenez rendez-vous <strong>gratuitement</strong></p>
            <button class="text-light-green text-sm font-bold py-1.5 mt-5 w-full rounded-3xl bg-white">
                <a href="rendezvous">Demander un rendez-vous</a>
            </button>
        </div>
    </div>
</aside>
