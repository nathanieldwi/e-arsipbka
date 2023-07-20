<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><?= $pages ?></h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Change Password <?= $pages ?></h5>
                        <button type="button" class="btn btn-warning" onclick="history.back()">Kembali</button>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('user/change_password/' . $res->user_id) ?>" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= validation_errors('new_password') ? 'is-invalid' : '' ?>" name="new_password" id="new_password" autocomplete="off" placeholder="******" value="<?= set_value('new_password') ?>">
                                    <div class="form-text text-danger"><?= validation_show_error('new_password') ?></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= validation_errors('confirm_password') ? 'is-invalid' : '' ?>" name="confirm_password" id="confirm_password" autocomplete="off" placeholder="******" value="<?= set_value('confirm_password') ?>">
                                    <div class="form-text text-danger"><?= validation_show_error('confirm_password') ?></div>
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