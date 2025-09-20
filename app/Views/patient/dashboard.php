<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="w-full h-[85vh] my-2 px-5 bg-neutral-300/40 rounded-lg flex flex-col">
    <!-- Start -->
    <div class="flex items-start justify-between">
        <div>
            <h1 class="text-2xl font-bold">Dashboard</h1>
            <p>Bienvenue dans votre espace patient. Ici vous verrez vos informations.</p>
        </div>

        <button class="py-1 mt-2 font-medium hover:text-gray-600 transition-colors duration-100 hover:border hover:border-gray-200 px-3 rounded-md bg-white"><i class="mdi mdi-refresh mr-1"></i>Actualiser</button>
    </div>
</div>

<?= $this->endSection() ?>