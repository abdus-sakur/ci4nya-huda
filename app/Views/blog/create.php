<?= $this->extend('layouts/templates'); ?>
<?= $this->section('css'); ?>
<!-- custom css -->
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="card col-md-6">
    <div class="card-body">
        <form action="<?= base_url('blog'); ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="form-group row">
                <label for="" class="col-sm-3">Title</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3">Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                </div>
            </div>
            <div class="float-right">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<!-- custom js -->
<?= $this->endSection(); ?>