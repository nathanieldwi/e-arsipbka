<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('layout/head') ?>
</head>

<body>
    <div class="wrapper">
        <?= $this->include('layout/sidebar') ?>

        <div class="main">
            <?= $this->include('layout/navbar') ?>

            <?= $this->renderSection('content') ?>

            <?= $this->include('layout/footer') ?>
        </div>
    </div>

    <?= $this->include('layout/javascript') ?>

</body>

</html>