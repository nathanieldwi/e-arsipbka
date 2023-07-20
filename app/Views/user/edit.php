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
                        <form action="<?= base_url('user/update/' . $res->user_id) ?>" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= validation_errors('nama_lengkap') ? 'is-invalid' : '' ?>" name="nama_lengkap" id="nama_lengkap" autocomplete="off" placeholder="Masukan Nama Lengkap" value="<?= $res->nama_lengkap ?>">
                                    <div class="form-text text-danger"><?= validation_show_error('nama_lengkap') ?></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= validation_errors('username') ? 'is-invalid' : '' ?>" name="username" id="username" autocomplete="off" placeholder="Masukan Username" value="<?= $res->username ?>">
                                    <div class="form-text text-danger"><?= validation_show_error('username') ?></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="level" class="col-sm-2 col-form-label">Level</label>
                                <div class="col-sm-10">
                                    <select name="level" id="level" class="form-select <?= validation_errors('level') ? 'is-invalid' : '' ?>">
                                        <option value="">--- Pilih Level ---</option>
                                        <option value="admin" <?= $res->level == 'admin' ? 'selected' : '' ?>>Admin</option>
                                        <option value="superadmin" <?= $res->level == 'superadmin' ? 'selected' : '' ?>>Superadmin</option>
                                        <option value="user" <?= $res->level == 'user' ? 'selected' : '' ?>>User</option>
                                    </select>
                                    <div class="form-text text-danger"><?= validation_show_error('level') ?></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="sampulOld" value="<?= $res->sampul ?>">
                                    <input type="file" class="form-control <?= validation_errors('sampul') ? 'is-invalid' : '' ?>" name="sampul" id="sampul" autocomplete="off" placeholder="Masukan Sampul" value="<?= set_value('sampul') ?>">
                                    <div class="form-text text-danger"><?= validation_show_error('sampul') ?></div>
                                    <div><img src="<?= base_url('assets/uploads/' . $res->sampul) ?>" class="img-fluid img-thumbnail"></div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?= $this->endSection() ?>