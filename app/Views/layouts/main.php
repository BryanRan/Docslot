<!-- app/Views/layouts/main.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Docslot' ?></title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" rel="stylesheet">

</head>

<body class="flex w-full pt-4">

    <!-- Sidebar -->
    <?= $this->include('layouts/sidebar') ?>

    <!-- Zone principale -->
    <main class="flex-1 p-2">
        <?= $this->include('layouts/header') ?>
        <?= $this->renderSection('content') ?>
    </main>
    <script src="<?=base_url('js/dash_anim.js')?>"></script>
</body>

</html>