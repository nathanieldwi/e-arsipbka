<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><?= $pages ?></h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Edit Data <?= $pages ?></h5>
                        <button type="button" class="btn btn-warning" onclick="history.back()">Kembali</button>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('jenis/update/' . $res->jenis_id) ?>" method="post">
                            <div class="row mb-3">
                                <label for="nama_jenis" class="col-sm-2 col-form-label">Nama Jenis</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= validation_errors('nama_jenis') ? 'is-invalid' : '' ?>" name="nama_jenis" id="nama_jenis" autocomplete="off" placeholder="Masukan Nama Jenis" value="<?= $res->nama_jenis ?>">
                                    <div class="form-text text-danger"><?= validation_show_error('nama_jenis') ?></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="detail" class="col-sm-2 col-form-label">Detail</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control <?= validation_errors('detail') ? 'is-invalid' : '' ?>" name="detail" id="detail" cols="30" rows="3" placeholder="Masukan Detail"><?= $res->detail ?></textarea>
                                    <div class="form-text text-danger"><?= validation_show_error('detail') ?></div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Edit Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?= $this->endSection() ?>