<?php if (session('alert_success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session('alert_success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php elseif (session('alert_error')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session('alert_error'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php elseif (session('alert_warning')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= session('alert_warning'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>