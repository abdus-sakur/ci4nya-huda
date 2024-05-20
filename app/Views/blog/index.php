<?= $this->extend('layouts/templates'); ?>
<?= $this->section('css'); ?>
<!-- custom css -->
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <a href="<?= base_url('blog/create'); ?>" class="btn btn-primary mb-2">Tambah Blog</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Post</th>
                    <th>Last Update</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($blogs as $i => $blog) : ?>
                    <tr>
                        <td>
                            <a href="<?= base_url('blog/edit/' . $blog->id); ?>" class="btn btn-info d-block mb-2">Edit</a>
                            <form action="<?= base_url('blog'); ?>" onsubmit="return confirm('Yakin hapus?');" method="POST">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="id" value="<?= $blog->id; ?>">
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <td><?= $blog->title; ?></td>
                        <td><?= $blog->description; ?></td>
                        <td><?= $blog->created_at; ?></td>
                        <td><?= $blog->updated_at; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pager->links('blogs', 'custom-pagination') ?>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<!-- custom js -->
<?= $this->endSection(); ?>