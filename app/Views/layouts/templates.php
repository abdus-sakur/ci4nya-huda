<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?? ''; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->include('layouts/css'); ?>
    <?= $this->renderSection('css'); ?>
</head>

<body data-topbar="dark" data-layout="horizontal">

    <div id="layout-wrapper">
        <?= $this->include('layouts/header'); ?>
        <?= $this->include('layouts/topbar'); ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?= $this->include('common/alert'); ?>
                    <?= $this->renderSection('content'); ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('layouts/script'); ?>
    <?= $this->renderSection('script'); ?>
</body>

</html>