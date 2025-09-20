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

<body class="flex bg-gray-100 w-screen h-screen pt-1">

    <!-- Sidebar -->
    <?= $this->include('layouts/sidebar') ?>

    <!-- Zone principale -->
    <main class="flex-1 p-2">
        <?= $this->include('layouts/header') ?>
        <?= $this->renderSection('content') ?>
    </main>

</body>

</html>