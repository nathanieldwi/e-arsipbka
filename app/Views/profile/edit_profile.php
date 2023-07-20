<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle"><?= $pages ?></h1>
        </div>
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="<?= base_url('update_profile') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?= $account->user_id ?>">
                            <div class="row mb-3">
                                <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= validation_errors('nama_lengkap') ? 'is-invalid' : '' ?>" name="nama_lengkap" id="nama_lengkap" autocomplete="off" placeholder="Masukan Nama Lengkap" value="<?= $account->nama_lengkap ?>">
                                    <div class="form-text text-danger"><?= validation_show_error('nama_lengkap') ?></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= validation_errors('username') ? 'is-invalid' : '' ?>" name="username" id="username" autocomplete="off" placeholder="Masukan Username" value="<?= $account->username ?>">
                                    <div class="form-text text-danger"><?= validation_show_error('username') ?></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="sampulOld" value="<?= $account->sampul ?>">
                                    <input type="file" class="form-control <?= validation_errors('sampul') ? 'is-invalid' : '' ?>" name="sampul" id="sampul" autocomplete="off" placeholder="Masukan Sampul" value="<?= set_value('sampul') ?>">
                                    <div class="form-text text-danger"><?= validation_show_error('sampul') ?></div>
                                    <div><img src="<?= base_url('assets/uploads/' . $account->sampul) ?>" class="img-fluid img-thumbnail"></div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                            <button type="button" class="btn btn-info" onclick="history.back()">Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>