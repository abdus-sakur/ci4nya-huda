<?= $this->extend('layouts/templates'); ?>
<?= $this->section('css'); ?>
<!-- custom css -->
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalComment">Create Comment</button>
        <table class="table table-bordered" id="datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Blog Title</th>
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalComment" data-backdrop="static" data-keyboard="true" tabindex="-1" aria-labelledby="modalCommentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCommentLabel">Form Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('comment'); ?>" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label for="" class="col-sm-3">Blog</label>
                        <div class="col-sm-9">
                            <select class="select2" name="blog" id="blog" data-placeholder="Pilih judul blog">
                                <option value=""></option>
                                <?php foreach ($blogs as $blog) : ?>
                                    <option value="<?= $blog->id; ?>"><?= $blog->title; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3">Comment</label>
                        <div class="col-sm-9">
                            <textarea name="comment" id="comment" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<!-- custom js -->
<script>
    $(document).ready(function() {
        $(".select2").select2()

        $(document).on("click", ".edit", function() {
            let id = $(this).data('id')

            $.ajax({
                method: 'GET',
                url: '/comment/' + id
            }).done((result) => {
                console.log(result)
                $("#id").val(result.data.id)
                $("#blog").val(result.data.blog_id).trigger('change')
                $("#comment").val(result.data.comment)
                $("#modalComment").modal('show')
            })
        })

        $(document).on("click", ".delete", function() {
            Swal.fire({
                title: "Yakin hapus?",
                text: "Apakah anda yakin akan menghapus data ini ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.value == true) {
                    $.ajax({
                        method: "POST",
                        url: "/comment",
                        data: {
                            _method: "DELETE",
                            id: $(this).data("id"),
                        },
                    }).done(function(msg) {
                        console.log(msg)
                        if (msg.status == true) {
                            return Swal.fire("Deleted!", "Data sudah dihapus.", "success").then(function() {
                                location.reload()
                            })
                        } else {
                            return Swal.fire("Failed!", "Data gagal dihapus, tidak dapat terhubung dengan database", "error")
                        }
                    })
                }
            })
        })

        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/comment/datatable',
                method: 'GET'
            },
            order: [],
            columns: [{
                data: 'number',
                orderable: false
            }, {
                data: 'title'
            }, {
                data: 'comment'
            }, {
                data: 'action'
            }]
        });
    })
</script>
<?= $this->endSection(); ?>