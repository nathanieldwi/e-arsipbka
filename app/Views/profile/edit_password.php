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
                        <form action="<?= base_url('update_password') ?>" method="post">
                            <input type="hidden" name="user_id" value="<?= $account->user_id ?>">
                            <div class="row mb-3">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= validation_errors('password') ? 'is-invalid' : '' ?>" name="password" id="password" autocomplete="off" placeholder="Masukan Password" value="<?= set_value('pasword') ?>">
                                    <div class="form-text text-danger"><?= validation_show_error('password') ?></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= validation_errors('confirm_password') ? 'is-invalid' : '' ?>" name="confirm_password" id="confirm_password" autocomplete="off" placeholder="Masukan Confirm Password" value="<?= set_value('confirm_pasword') ?>">
                                    <div class="form-text text-danger"><?= validation_show_error('confirm_password') ?></div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah Password</button>
                            <button type="button" class="btn btn-info" onclick="history.back()">Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>